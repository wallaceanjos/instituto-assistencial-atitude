document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll('.counter');
    let started = false; // Flag para garantir que a animação inicie apenas uma vez

    const startCounting = () => {
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const speed = target / 200;
                const inc = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + inc);
                    setTimeout(updateCount, 50); // Ajuste a velocidade de atualização se necessário
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });
    };

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !started) {
                startCounting();
                started = true; // Garante que a contagem só comece uma vez
            }
        });
    }, { threshold: 0.8 }); // A seção precisa estar 50% visível na viewport

    // Observa a seção onde os contadores estão
    const section = document.querySelector('.counter-container');
    if (section) {
        observer.observe(section);
    }
});
