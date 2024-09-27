document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll('.counter');
    let started = false; // Flag para garantir que a animação inicie apenas uma vez

    const startCounting = () => {
        // Determina o maior valor de target entre todos os contadores
        const maxTarget = Math.max(...Array.from(counters).map(counter => +counter.getAttribute('data-target')));

        // Define o tempo total da animação (em milissegundos)
        const duration = 2000; // 2 segundos
        const speed = duration / 100; // Número de atualizações durante a animação

        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            let start = null;

            const updateCount = (timestamp) => {
                if (!start) start = timestamp;
                const progress = timestamp - start;
                const increment = target * (progress / duration);

                // Atualiza o texto do contador
                counter.innerText = Math.ceil(increment);

                // Continua a animação até que o tempo total seja alcançado
                if (progress < duration) {
                    requestAnimationFrame(updateCount);
                } else {
                    counter.innerText = target;
                }
            };

            requestAnimationFrame(updateCount);
        });
    };

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !started) {
                startCounting();
                started = true; // Garante que a contagem só comece uma vez
            }
        });
    }, { threshold: 0.2 }); // A seção precisa estar 20% visível na viewport

    // Observa a seção onde os contadores estão
    const section = document.querySelector('.counter-container');
    if (section) {
        observer.observe(section);
    }
});
