const loginContainer = document.querySelector('.login-container');
const registerBtn = document.querySelector('.toggle-box .toggle-panel .register-btn');
const loginBtn = document.querySelector('.toggle-box .toggle-panel .login-btn');
const navbar = document.querySelector('.navbar');



document.addEventListener('DOMContentLoaded', async () => {
    // Función para cargar productos
    const loadProducts = async () => {
        try {
            const response = await fetch(`../../controllers/productController.php?action=getProducts`);
            const data = await response.json();

            if (data.ok) {
                const productList = document.querySelector('#productList');
                productList.innerHTML = '';

                data.products.forEach(product => {
                    productList.innerHTML += `
                        <tr>
                            <td>${product.name}</td>
                            <td>${product.description}</td>
                            <td>$${product.price}</td>
                            <td>${product.stock}</td>
                            <td>${product.brand}</td>
                            <td style="display: flex; justify-content: center; gap: 10px;">
                                <button class="btn edit" data-id="${product.product_id}">📝</button>
                                <button class="btn delete" data-id="${product.product_id}">❌</button>
                            </td>
                        </tr>
                    `;
                });
            } else {
                console.error('Error loading products:', data.message);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    };

    const productList = document.querySelector('#productList');

    // Ahora podemos usar loadProducts después de su declaración
    if (productList) {
        await loadProducts();
    }

    // Login/Register functionality
    if (loginContainer && registerBtn && loginBtn) {
        registerBtn.addEventListener('click', () => {
            loginContainer.classList.add('active');
        });

        loginBtn.addEventListener('click', () => {
            loginContainer.classList.remove('active');
        });
    }

    // navbar
    const sections = document.querySelectorAll('section');
    const navLinks = {
        home: document.querySelector('#home-link'),
        featured: document.querySelector('#featured-link'),
        categories: document.querySelector('#categories-link'),
        catalog: document.querySelector('#catalog-link')
    };

    navLinks.catalog.addEventListener('click', () => {
        this.classList.toogle('active');
    });
    if (sections.length > 0) { // Solo si estamos en index.php
        const observerOptions = {
            threshold: 0.3,
            rootMargin: '-80px 0px 0px 0px' // Compensar la altura del navbar
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Remover active de todos los links
                    Object.values(navLinks).forEach(link => {
                        if (link) link.classList.remove('active');
                    });

                    // Activar el link correspondiente
                    switch (entry.target.id) {
                        case 'home':
                            navLinks.home?.classList.add('active');
                            break;
                        case 'featured-products':
                            navLinks.featured?.classList.add('active');
                            break;
                        case 'product-categories':
                            navLinks.categories?.classList.add('active');
                            break;
                    }
                }
            });
        }, observerOptions);

        sections.forEach(section => observer.observe(section));

        const cards = document.querySelector('.cards');
        const images = cards.querySelectorAll('img'); // Obtener todos los elementos img
        const totalCards = images.length;
        let index = 0;

        function changeSlide() {
            index++;
            cards.style.transition = `transform 1s ease-in-out`;
            cards.style.transform = `translateX(${-400 * index}px)`;

            if (index >= totalCards - 1) {
                setTimeout(() => {
                    cards.style.transition = "none";
                    cards.style.transform = `translateX(0)`;
                    index = 0;
                }, 1000);
            }
        }

        setInterval(changeSlide, 3000);
    }


    // navbar scroll 
    window.addEventListener('scroll', () => {
        if (window.scrollY > 80) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // // modals for create and edit products
    const createModal = document.querySelector('#createModal');
    const editModal = document.querySelector('#editModal');
    const btnAddProduct = document.querySelector('.dashboard-container .option-box .add-product');
    const close = document.querySelectorAll('.modal .close');

    btnAddProduct.addEventListener('click', () => {
        document.querySelector('.navbar').style.zIndex= '0';
        createModal.style.display = 'block';
    });

    close.forEach(closeBtn => {
        closeBtn.addEventListener('click', () => {
            createModal.style.display = 'none';
            editModal.style.display = 'none';
        });
    });

    // send data to create a product
    const formCreate = document.querySelector('#formCreate');
    console.log(formCreate);
    formCreate.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(formCreate);
        e.preventDefault();
        const response = await fetch('../../controllers/productController.php?action=register', {
            method: 'POST',
            body: formData
        });
        if (response.ok) {
            alert('Product created successfully');
            location.reload();
            await loadProducts(); // Recargar productos después de crear uno nuevo
        }
    });

    const editForm = document.querySelector('#editForm');
    if (editForm) {
        editForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            try {
                const formData = new FormData(editForm);
                const response = await fetch('../../controllers/productController.php?action=edit', {
                    method: 'POST',
                    body: formData
                });

                // Parsear JSON de la respuesta (importante)
                const result = await response.json();
                console.log('result', result);

                if (result.ok) {
                    alert('Producto actualizado correctamente');
                    document.querySelector('#editModal').style.display = 'none';
                    await loadProducts();
                } else {
                    alert('Error al actualizar el producto: ' + (result.message || ''));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error al procesar la solicitud');
            }
        });
    }


    function loadProductData(productId) {
        fetch(`../../controllers/productController.php?action=getProduct&product_id=${productId}`)
            .then(response => response.json())
            .then(data => {
                document.querySelector('.navbar').style.zIndex= '0';
                if (data.ok) {
                    const product = data.product;

                    const form = document.querySelector('#editForm');
                    if (!form) {
                        console.error('Form not found');
                        return;
                    }

                    // Actualizar valores usando el nombre correcto de los campos
                    form.querySelector('input[name="product_id"]').value = product.product_id;
                    form.querySelector('input[name="name"]').value = product.name;
                    form.querySelector('input[name="name"]').disabled = true;
                    form.querySelector('input[name="description"]').value = product.description;
                    form.querySelector('input[name="price"]').value = product.price;
                    form.querySelector('input[name="stock"]').value = product.stock;

                    // Mostrar el modal
                    document.querySelector('#editModal').style.display = 'block';
                } else {
                    console.error('Error loading product data:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    // delegar eventos para los botones editar
    document.addEventListener('click', async (e) => {
        if (e.target.classList.contains('edit')) {
            const productId = e.target.dataset.id;
            loadProductData(productId);
        }
    })

    // funcion para eliminar producto
    const deleteProduct = async (productId) => {
        if (confirm('¿Estás seguro de eliminar este producto?')) {
            try {
                const formData = new FormData();
                formData.append('product_id', productId);

                const response = await fetch('../../controllers/productController.php?action=deleteProduct', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.ok) {
                    alert(data.message);
                    await loadProducts(); // Recargar la lista después de eliminar
                } else {
                    alert('Error al eliminar el producto: ' + data.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error al procesar la solicitud');
            }
        }
    };

    // Delegación de eventos para los botones de eliminar
    document.addEventListener('click', async (e) => {
        if (e.target.classList.contains('delete')) {
            const productId = e.target.dataset.id;
            await deleteProduct(productId);
        }
    });
}); // Final del DOMContentLoaded
