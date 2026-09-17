export function initCartApp() {
    const cartKey = 'warung_makan_cart';

    // ===== Reveal observers (shared by landing & order pages) =====
    const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) entry.target.classList.add('active');
        });
    }, observerOptions);
    document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale').forEach((el) => observer.observe(el));

    const staggerObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll('.stagger-item').forEach((item, index) => {
                    setTimeout(() => item.classList.add('active'), index * 80);
                });
            }
        });
    }, { threshold: 0.05, rootMargin: '0px 0px -30px 0px' });
    document.querySelectorAll('.stagger-grid').forEach((el) => staggerObserver.observe(el));

    // ===== DOM refs =====
    const cartToggle = document.querySelector('#cart-toggle');
    const cartDrawer = document.querySelector('#cart-drawer');
    const cartClose = document.querySelector('#cart-close');
    const cartCount = document.querySelector('#cart-count');
    const cartItemsList = document.querySelector('#cart-items');
    const cartTotal = document.querySelector('#cart-total');
    const cartMessage = document.querySelector('#cart-message');
    const checkoutButtons = document.querySelectorAll('.checkout-button, #cart-checkout');
    const checkoutModal = document.querySelector('#checkout-modal');
    const checkoutCancel = document.querySelector('#checkout-cancel');
    const checkoutClose = document.querySelector('#checkout-close');
    const checkoutConfirm = document.querySelector('#checkout-confirm');
    const checkoutSummary = document.querySelector('#checkout-summary');
    const checkoutTotal = document.querySelector('#checkout-total');
    const checkoutName = document.querySelector('#checkout-name');
    const checkoutPhone = document.querySelector('#checkout-phone');
    const checkoutService = document.querySelector('#checkout-service');
    const orderConfirmationModal = document.querySelector('#order-confirmation-modal');
    const orderConfirmationId = document.querySelector('#order-confirmation-id');
    const orderConfirmationItems = document.querySelector('#order-confirmation-items');
    const orderConfirmationTotal = document.querySelector('#order-confirmation-total');
    const orderRefCode = document.querySelector('#order-ref-code');
    const orderCustomer = document.querySelector('#order-confirmation-customer');
    const orderCustomerPhone = document.querySelector('#order-confirmation-phone');
    const orderService = document.querySelector('#order-confirmation-service');
    const orderBarcodeContainer = document.querySelector('#order-barcode-container');
    const orderBarcodeImg = document.querySelector('#order-barcode-img');
    const orderConfirmationClose = document.querySelectorAll('#order-confirmation-close, #order-confirmation-close-2');
    const orderConfirmationCopy = document.querySelector('#order-confirmation-copy');
    const removeConfirmModal = document.querySelector('#remove-confirm-modal');
    const confirmRemoveButton = document.querySelector('#confirm-remove');
    const cancelRemoveButton = document.querySelector('#cancel-remove');
    const siteToast = document.querySelector('#site-toast');
    const siteToastText = document.querySelector('#site-toast-text');
    const siteToastAction = document.querySelector('#site-toast-action');
    const siteToastClose = document.querySelector('#site-toast-close');

    let cart = loadCart();
    let removeTargetId = null;

    function loadCart() {
        try {
            const stored = localStorage.getItem(cartKey);
            return stored ? JSON.parse(stored) : [];
        } catch {
            return [];
        }
    }

    function saveCart() {
        try {
            localStorage.setItem(cartKey, JSON.stringify(cart));
        } catch {}
    }

    function getCartCount() {
        return cart.reduce((sum, item) => sum + item.quantity, 0);
    }

    function getCartTotal() {
        return cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    }

    function formatRupiah(amount) {
        return `Rp ${amount.toLocaleString('id-ID')}`;
    }

    async function removeUnavailableItems() {
        try {
            const resp = await fetch('/menu/available/ids');
            const availableIds = (await resp.json()).map(String);
            const before = cart.length;
            cart = cart.filter((item) => availableIds.includes(String(item.id)));
            if (cart.length !== before) {
                saveCart();
    updateCartUI();
    removeUnavailableItems();
            }
        } catch {}
    }

    function showCartMessage(text) {
        if (!cartMessage) return;
        cartMessage.textContent = text;
        cartMessage.classList.remove('hidden');
        cartMessage.classList.add('opacity-100');
        clearTimeout(showCartMessage.timeout);
        showCartMessage.timeout = setTimeout(() => cartMessage.classList.add('hidden'), 1800);
    }

    function hideSiteToast() {
        if (!siteToast) return;
        siteToast.classList.add('hidden');
        siteToastAction.classList.add('hidden');
    }

    function showSiteToast(text, actionLabel = null, action = null, timeout = 3000, actionParam = null) {
        if (!siteToast) return;
        siteToastText.textContent = text;
        if (actionLabel && action) {
            siteToastAction.textContent = actionLabel;
            siteToastAction.classList.remove('hidden');
            siteToastAction.onclick = (e) => {
                e.preventDefault();
                if (action === 'view-cart') {
                    openCartDrawer();
                } else if (action === 'checkout') {
                    openCheckoutModal();
                } else if (action === 'copy-order') {
                    if (actionParam) {
                        navigator.clipboard?.writeText(String(actionParam)).then(() => {
                            siteToastText.textContent = 'ID pesanan disalin ke clipboard';
                            setTimeout(() => hideSiteToast(), 1500);
                        }).catch(() => {
                            siteToastText.textContent = 'Gagal menyalin ID';
                        });
                    }
                }
                hideSiteToast();
            };
        } else {
            siteToastAction.classList.add('hidden');
            siteToastAction.onclick = null;
        }
        siteToast.classList.remove('hidden');
        clearTimeout(showSiteToast._timeout);
        showSiteToast._timeout = setTimeout(() => hideSiteToast(), timeout);
    }

    function updateCartUI() {
        if (!cartCount || !cartItemsList || !cartTotal) return;

        cartCount.textContent = getCartCount();
        cartItemsList.innerHTML = '';

        if (cart.length === 0) {
            cartItemsList.innerHTML = '<li class="text-dust text-center py-8">Keranjang kosong.</li>';
        } else {
            cart.forEach((item) => {
                const li = document.createElement('li');
                li.className = 'cart-item-card rounded-2xl p-4 bg-coal border border-line';
                li.innerHTML = `
                    <div class="flex items-center justify-between gap-3 mb-4">
                        <div class="min-w-0">
                            <div class="font-semibold text-sm text-bone">${item.name}</div>
                            <div class="text-sm text-sand mt-1">${formatRupiah(item.price)}</div>
                        </div>
                        <button class="remove-item text-sand hover:text-ember" data-id="${item.id}" aria-label="Remove">
                            <span class="material-symbols-outlined text-lg">delete</span>
                        </button>
                    </div>
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <button class="qty-decrease rounded-full border border-line px-3 py-2 text-sand hover:text-bone" data-id="${item.id}">−</button>
                            <div class="qty-value px-4 py-2 rounded-full bg-coal-3 text-bone">${item.quantity}</div>
                            <button class="qty-increase rounded-full border border-line px-3 py-2 text-sand hover:text-bone" data-id="${item.id}">+</button>
                        </div>
                        <div class="font-semibold text-bone">${formatRupiah(item.price * item.quantity)}</div>
                    </div>
                `;
                cartItemsList.appendChild(li);
            });

            cartItemsList.querySelectorAll('.qty-increase').forEach((btn) => {
                btn.addEventListener('click', (e) => changeQuantity(e.currentTarget.dataset.id, 1));
            });
            cartItemsList.querySelectorAll('.qty-decrease').forEach((btn) => {
                btn.addEventListener('click', (e) => changeQuantity(e.currentTarget.dataset.id, -1));
            });
            cartItemsList.querySelectorAll('.remove-item').forEach((btn) => {
                btn.addEventListener('click', (e) => showRemoveConfirm(e.currentTarget.dataset.id));
            });
        }

        cartTotal.textContent = formatRupiah(getCartTotal());

        const wa = document.querySelector('#cart-whatsapp');
        if (wa) {
            if (cart.length === 0) {
                wa.setAttribute('href', '#');
                wa.classList.add('opacity-60', 'pointer-events-none');
            } else {
                const lines = cart.map((i) => `${i.quantity}x ${i.name} - ${formatRupiah(i.price * i.quantity)}`);
                const total = formatRupiah(getCartTotal());
                const msg = `Pesanan:%0A${lines.join('%0A')}%0ATotal: ${total}`;
                const PHONE = document.querySelector('#cart-whatsapp')?.dataset.whatsappPhone
                    || document.querySelector('meta[name="whatsapp-number"]')?.content
                    || '6285810405551';
                wa.setAttribute('href', `https://wa.me/${PHONE}?text=${encodeURIComponent(msg)}`);
                wa.classList.remove('opacity-60', 'pointer-events-none');
            }
        }
    }

    function addToCart(item) {
        const existing = cart.find((cartItem) => cartItem.id === item.id);
        if (existing) {
            existing.quantity += 1;
        } else {
            cart.push({ ...item, quantity: 1 });
        }
        saveCart();
        updateCartUI();
    }

    function changeQuantity(id, delta) {
        const item = cart.find((i) => i.id === id);
        if (!item) return;
        item.quantity = Math.max(0, item.quantity + delta);
        if (item.quantity === 0) {
            cart = cart.filter((i) => i.id !== id);
        }
        saveCart();
        updateCartUI();
    }

    function removeItem(id) {
        cart = cart.filter((i) => i.id !== id);
        saveCart();
        updateCartUI();
    }

    function clearCart() {
        cart = [];
        saveCart();
        updateCartUI();
    }

    function showRemoveConfirm(id) {
        removeTargetId = id;
        if (!removeConfirmModal) {
            removeItem(id);
            return;
        }
        removeConfirmModal.classList.remove('hidden');
    }

    function hideRemoveConfirm() {
        if (!removeConfirmModal) return;
        removeTargetId = null;
        removeConfirmModal.classList.add('hidden');
    }

    function confirmRemove() {
        if (!removeTargetId) {
            hideRemoveConfirm();
            return;
        }
        removeItem(removeTargetId);
        hideRemoveConfirm();
        showSiteToast('Item dihapus dari keranjang.');
    }

    function openCartDrawer() {
        if (!cartDrawer) return;
        removeUnavailableItems();
        updateCartUI();
        cartDrawer.classList.remove('hidden');
    }

    function toggleCartDrawer() {
        if (!cartDrawer) return;
        openCartDrawer();
    }

    function renderCheckoutSummary() {
        if (!checkoutSummary || !checkoutTotal) return;
        checkoutSummary.innerHTML = '';
        if (cart.length === 0) {
            checkoutSummary.innerHTML = '<p class="text-sand">Tidak ada item di keranjang.</p>';
            checkoutTotal.textContent = formatRupiah(0);
            return;
        }
        cart.forEach((item) => {
            const line = document.createElement('div');
            line.className = 'flex items-center justify-between gap-4';
            line.innerHTML = `
                <div>
                    <div class="font-semibold text-bone">${item.name}</div>
                    <div class="text-sm text-sand">${item.quantity} × ${formatRupiah(item.price)}</div>
                </div>
                <div class="font-semibold text-bone">${formatRupiah(item.price * item.quantity)}</div>
            `;
            checkoutSummary.appendChild(line);
        });
        checkoutTotal.textContent = formatRupiah(getCartTotal());
    }

    function openCheckoutModal() {
        if (!checkoutModal) return;
        renderCheckoutSummary();
        if (checkoutName) checkoutName.value = '';
        checkoutModal.classList.remove('hidden');
    }

    function closeCheckoutModal() {
        if (!checkoutModal) return;
        checkoutModal.classList.add('hidden');
    }

    function closeCartDrawer() {
        if (cartDrawer) cartDrawer.classList.add('hidden');
    }

    // ===== Event wiring =====
    if (cartToggle) {
        cartToggle.addEventListener('click', () => {
            updateCartUI();
            toggleCartDrawer();
        });
    }
    if (cartClose) {
        cartClose.addEventListener('click', closeCartDrawer);
    }
    if (siteToastClose) {
        siteToastClose.addEventListener('click', hideSiteToast);
    }
    if (confirmRemoveButton) {
        confirmRemoveButton.addEventListener('click', confirmRemove);
    }
    if (cancelRemoveButton) {
        cancelRemoveButton.addEventListener('click', hideRemoveConfirm);
    }

    checkoutButtons.forEach((button) => {
        button.addEventListener('click', () => {
            if (cart.length === 0) {
                showSiteToast('Keranjang kosong. Tambahkan item terlebih dahulu.');
                return;
            }
            openCheckoutModal();
        });
    });
    if (checkoutCancel) checkoutCancel.addEventListener('click', closeCheckoutModal);
    if (checkoutClose) checkoutClose.addEventListener('click', closeCheckoutModal);

    if (checkoutConfirm) {
        checkoutConfirm.addEventListener('click', async () => {
            const customerName = checkoutName ? checkoutName.value.trim() : '';
            if (!customerName) {
                showSiteToast('Mohon isi nama pelanggan terlebih dahulu.');
                if (checkoutName) checkoutName.focus();
                return;
            }
            const customerPhone = checkoutPhone ? checkoutPhone.value.trim() : null;
            const serviceType = checkoutService ? checkoutService.value : 'dine_in';
            try {
                const tokenEl = document.querySelector('meta[name="csrf-token"]');
                const csrf = tokenEl ? tokenEl.getAttribute('content') : '';
                const resp = await fetch('/checkout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        items: cart,
                        total: getCartTotal(),
                        customer_name: customerName,
                        customer_phone: customerPhone,
                        service_type: serviceType
                    })
                });
                const json = await resp.json();
                if (resp.ok && json.success) {
                    const serviceLabel = { dine_in: 'Dine-in', takeaway: 'Takeaway', delivery: 'Delivery' }[serviceType] || serviceType;
                    const orderData = json.order || {
                        id: json.order_id,
                        items: cart,
                        total: getCartTotal(),
                        customer_name: customerName,
                        customer_phone: customerPhone,
                        service_type: serviceLabel
                    };
                    clearCart();
                    closeCheckoutModal();
                    closeCartDrawer();
                    showSiteToast('Pesanan berhasil #' + (json.order_id || ''), 'Salin ID', 'copy-order', 6000, json.order_id);
                    showOrderConfirmation(orderData, json.reference_code, json.barcode_url);
                } else if (resp.status === 409 && json.unavailable_items) {
                    showSiteToast(json.message || 'Item tidak tersedia');
                    removeUnavailableItems();
                } else {
                    showSiteToast(json.message || 'Gagal memproses pesanan.');
                }
            } catch {
                showSiteToast('Gagal menghubungi server.');
            }
        });
    }

    function showOrderConfirmation(order, refCode, barcodeUrl) {
        if (!orderConfirmationModal) return;
        const customerName = order.customer_name || '';
        if (orderCustomer) orderCustomer.textContent = customerName || '-';
        if (orderCustomerPhone) orderCustomerPhone.textContent = order.customer_phone || '-';
        if (orderService) orderService.textContent = order.service_type || '-';
        orderConfirmationId.textContent = '#' + (order.id || order.order_id || '');
        if (orderRefCode) orderRefCode.textContent = refCode || '-';
        if (orderBarcodeContainer && orderBarcodeImg) {
            if (barcodeUrl) {
                orderBarcodeImg.src = barcodeUrl;
                orderBarcodeImg.alt = refCode || 'Barcode';
                orderBarcodeContainer.classList.remove('hidden');
            } else {
                orderBarcodeContainer.classList.add('hidden');
            }
        }
        orderConfirmationItems.innerHTML = '';
        const items = order.items || order.order_items || [];
        if (items.length === 0) {
            orderConfirmationItems.innerHTML = '<p class="text-sand">Tidak ada item.</p>';
        } else {
            items.forEach((it) => {
                const div = document.createElement('div');
                div.className = 'flex items-center justify-between gap-4';
                const name = it.name || it.title || '';
                const qty = it.quantity || it.qty || 1;
                const price = it.price || 0;
                div.innerHTML = `
                    <div>
                        <div class="font-semibold">${name}</div>
                        <div class="text-sm text-sand">${qty} × ${formatRupiah(price)}</div>
                    </div>
                    <div class="font-semibold">${formatRupiah(price * qty)}</div>
                `;
                orderConfirmationItems.appendChild(div);
            });
        }
        orderConfirmationTotal.textContent = formatRupiah(order.total || getCartTotal());
        orderConfirmationModal.classList.remove('hidden');
    }

    if (orderConfirmationClose && orderConfirmationClose.length) {
        orderConfirmationClose.forEach((btn) => btn.addEventListener('click', () => orderConfirmationModal.classList.add('hidden')));
    }
    if (orderConfirmationCopy) {
        orderConfirmationCopy.addEventListener('click', printOrderReceipt);
    }

    function printOrderReceipt() {
        const orderId = orderConfirmationId.textContent;
        const refCode = orderRefCode ? orderRefCode.textContent : '';
        const customerName = orderCustomer ? orderCustomer.textContent : '';
        const customerPhone = orderCustomerPhone ? orderCustomerPhone.textContent : '';
        const serviceLabel = orderService ? orderService.textContent : '';
        const items = orderConfirmationItems;
        const total = orderConfirmationTotal ? orderConfirmationTotal.textContent : '';

        let rows = '';
        if (items) {
            items.querySelectorAll('div.flex.items-center.justify-between').forEach((row) => {
                const name = row.querySelector('.font-semibold')?.textContent || '';
                const detail = row.querySelector('.text-sm')?.textContent || '';
                const price = row.querySelectorAll('.font-semibold');
                const sub = price.length > 1 ? price[1].textContent : '';
                rows += `<tr>
                    <td style="padding:6px 4px;border-bottom:1px dashed #ccc">${name}</td>
                    <td style="padding:6px 4px;text-align:center;border-bottom:1px dashed #ccc">${detail.split('×')[0]?.trim() || ''}</td>
                    <td style="padding:6px 4px;text-align:right;border-bottom:1px dashed #ccc">${sub}</td>
                </tr>`;
            });
        }

        const printWin = window.open('', '_blank', 'width=380,height=600');
        if (!printWin) return;

        printWin.document.write(`
            <html>
            <head>
                <title>Struk Pesanan</title>
                <style>
                    *{margin:0;padding:0;box-sizing:border-box}
                    body{font-family:'Courier New',monospace;font-size:12px;color:#111;padding:20px;width:320px;margin:0 auto}
                    .header{text-align:center;margin-bottom:16px;padding-bottom:12px;border-bottom:2px dashed #000}
                    .header h2{font-size:14px;text-transform:uppercase;letter-spacing:2px;margin-bottom:4px}
                    .header p{font-size:11px;color:#555}
                    .divider{border-top:1px dashed #000;margin:10px 0}
                    table{width:100%;border-collapse:collapse;margin:12px 0}
                    th{padding:6px 4px;text-align:left;font-size:10px;text-transform:uppercase;border-bottom:2px solid #000}
                    th:last-child{text-align:right}
                    th:nth-child(2){text-align:center}
                    td{font-size:12px}
                    .total-row td{padding-top:10px;font-size:14px;font-weight:700;border-top:2px solid #000}
                    .total-row td:last-child{text-align:right}
                    .ref{text-align:center;margin:12px 0;font-size:11px;color:#555}
                    .ref code{font-size:14px;font-weight:700;color:#000;letter-spacing:3px}
                    .footer{text-align:center;margin-top:16px;padding-top:12px;border-top:2px dashed #000;font-size:10px;color:#888}
                </style>
            </head>
            <body>
                <div class="header">
                    <h2>Warung Makan Mba Neni</h2>
                    <p>Pakembaran, Bancarkembar, Purwokerto Utara</p>
                    <p>${new Date().toLocaleDateString('id-ID', { year:'numeric', month:'long', day:'numeric', hour:'2-digit', minute:'2-digit' })}</p>
                </div>
            <div class="ref">
                <div>${orderId}</div>
                <code>${refCode}</code>
            </div>
            <div class="divider"></div>
            <div>Nama: ${customerName}</div>
            <div>No. HP: ${customerPhone}</div>
            <div>Layanan: ${serviceLabel}</div>
            <div class="divider"></div>
                <table>
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th style="text-align:center">Jml</th>
                            <th style="text-align:right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>${rows}</tbody>
                    <tr class="total-row">
                        <td colspan="2">Total</td>
                        <td>${total}</td>
                    </tr>
                </table>
                <div class="divider"></div>
                <div class="footer">
                    <p>Terima kasih atas pesanan Anda!</p>
                    <p>— Mba Neni —</p>
                </div>
                <script>
                    window.onload = function() { window.print(); window.close(); };
                <\/script>
            </body>
            </html>
        `);
        printWin.document.close();
    }

    // ===== Category filter tabs (shared) =====
    document.querySelectorAll('.category-tab').forEach((tab) => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.category-tab').forEach((t) => {
                t.classList.remove('is-active');
            });
            tab.classList.add('is-active');

            const cat = tab.dataset.category;
            document.querySelectorAll('.menu-item').forEach((item) => {
                item.style.display = (cat === 'all' || item.dataset.category === cat) ? '' : 'none';
            });
        });
    });

    // ===== Add to cart buttons =====
    document.querySelectorAll('.add-to-cart').forEach((button) => {
        button.addEventListener('click', (event) => {
            const target = event.currentTarget;
            const itemId = target.dataset.id;
            const itemName = target.dataset.name;
            const price = Number(target.dataset.price || 0);
            if (!itemId || !itemName || !price) return;
            addToCart({ id: itemId, name: itemName, price });
            showSiteToast(`${itemName} ditambahkan ke keranjang.`, 'Lihat Keranjang', 'view-cart', 4000);
        });
    });

    updateCartUI();

    return {
        cartGetter: () => cart,
        getCartCount,
        openCartDrawer,
        closeCartDrawer,
        showSiteToast,
        showCartMessage,
        addToCart,
    };
}