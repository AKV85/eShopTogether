/* Animacijos stiliai */
@keyframes color-change {
    0% {
        background-color: pink; /* pradinė spalva */
    }
    50% {
        background-color: purple; /* tarpinė spalva */
    }
    100% {
        background-color: blue; /* galutinė spalva */
    }
}

/* Pradinė kategorijų puslapio spalva */
.category-page {
    background-color: pink;
    animation: color-change 5s infinite; /* animacija, trukmė - 5 sekundės, kartojimas - begalybė */
}
/*<div class="category-page">*/
/*</div>*/
