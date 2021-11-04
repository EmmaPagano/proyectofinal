

// SELECCIONO TODOS LOS ELEMENTOS CON LA CLASE COUNTER
const counters = document.querySelectorAll(".counter");
// SETEO LA VELOCIDAD MAXIMO 800, MAS ALTO MAS LENTO.
const speed = 600;

// POR CADA COUNTER
counters.forEach(counter => {
    // DEFINO LA FUNCION
    const updateCount = () => {
        // CAPTURO EL ATRIBUTO DATA-TARGET
        const target = +counter.getAttribute('data-target');
        // CAPTURO EL VALOR DEL ELEMENTO
        const count = +counter.innerText;
        // CALCULO UN APROXIMADO DEL INCREMENTO
        const inc = target / speed;

        // SI EL CONTADOR ES MENOR AL NUMERO FINAL SIGO AUMENTANDO EL CONTADOR Y EJECUTANDO LA FUNCION DE MANERA RECURSIVA CADA 1 MS
        if(count < target){
            counter.innerText = Math.round(count + inc);
            setTimeout(updateCount, 1);
        }else{
            // SINO DIRECTAMENTE LE COLOCO EL VALOR FINAL AL ELEMENTO
            counter.innerText = target;
        }
    }

    // PRIMER LLAMADO A LA FUNCION, APENAS ACCEDO A LA PAGINA.
    updateCount();
})




