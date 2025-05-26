document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card');
    const salade = document.querySelector('.salade');
    const btnValider = document.querySelector('.btn-valider');

    cards.forEach(card => {
        card.addEventListener('click', function () {
            if (this.classList.contains('used')) return;
            const img = this.querySelector('img');
            const flyingImg = img.cloneNode(true);



            const cardRect = this.getBoundingClientRect();
            const saladeRect = salade.getBoundingClientRect();


            flyingImg.style.position = 'fixed';
            flyingImg.style.left = cardRect.left + (cardRect.width / 2) - 50 + 'px';
            flyingImg.style.top = cardRect.top + (cardRect.height / 2) - 50 + 'px';
            flyingImg.style.width = '100px';
            flyingImg.style.height = '100px';
            flyingImg.style.zIndex = '1000';
            flyingImg.style.transition = 'all 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            flyingImg.style.pointerEvents = 'none';
            document.body.appendChild(flyingImg);

            setTimeout(() => {
                flyingImg.style.left = saladeRect.left + (saladeRect.width / 2) - 25 + 'px';
                flyingImg.style.top = saladeRect.top + (saladeRect.height / 2) - 25 + 'px';
                flyingImg.style.transform = 'scale(0.5) rotate(360deg)';
                flyingImg.style.opacity = '0.8';
            }, 50);

            salade.classList.add('shake');
            this.classList.add('used');

            setTimeout(() => {
                flyingImg.remove();
                salade.classList.remove('shake');
            }, 1600);
        });
    });
    btnValider.addEventListener('click', function () {
        const overlay = document.createElement('div');
        overlay.className = 'preparation-overlay';
        overlay.innerHTML = `
            <div class="preparation-content">
                <div class="chef-icon">🥗</div>
                <h2>Salade prête !</h2>
                <p class="success-text">Bon app :)</p>
                <button class="close-btn" onclick="this.parentElement.parentElement.remove(); window.location.reload();">Fermer</button>
            </div>
        `;

        document.body.appendChild(overlay);

        salade.classList.add('preparation');
    });
});


