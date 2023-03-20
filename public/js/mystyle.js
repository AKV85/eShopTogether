//Šioje programoje yra sukurta funkcija, kuri pateikia teksto animaciją - jis yra spausdinamas po truputį, taip, kad
// jis atrodytų, lyg jis rašomas tiesiogiai į puslapio elementą.
// Pirma, aprašomi kintamieji text, delay ir elem. text yra teksto eilutė, kurią reikia animuoti, delay nurodo, kiek
// milisekundžių turėtų praeiti tarp kiekvieno spausdinimo žingsnio, o elem yra puslapio elemento, į kurį bus
// spausdinamas tekstas, DOM elementas.
// Toliau aprašoma funkcija print_text, kuri ima tris parametrus: text, elem ir delay. Funkcijos veikimo principas yra
// toks: jei teksto eilutė yra ilgesnė nei nulis, spausdinamas pirmas simbolis iš teksto eilutės ir po tam tikro laiko
// (nurodyto delay kintamajame) iškviečiama funkcija setTimeout, kuri kviečia print_text funkciją su likusia teksto
// eilute, iškarpant pirmąjį simbolį (panaudotas slice() funkcijos) ir taip pat kintamąjį delay. Šis procesas
// kartojamas, kol visi teksto simboliai bus išspausdinti.
// Galiausiai, funkcija print_text yra iškviesta su text, elem ir delay kintamaisiais. Tai pradeda animaciją,
// spausdinant tekstą iš eilės, kol jis bus visiškai atvaizduotas puslapio elemente su nurodytu vėlavimu.
var text = "Sveiki apsilankę mano puslapyje!\n" +
    "    Trumpai papasakosiu apie save ir ka čia galite rasti :)\n" +
    "\n" +
    "    AKS - Kodėl AKS?\n" +
    "    Nes tai mano inicialai - Aurelija Klimaitė Stankevičienė.\n" +
    "    O Design - nes tai mano kurtas dizainas.\n" +
    "    Paprasta ir patogu.\n" +
    "\n" +
    "    Esu dviejų vaikų mama, todėl man labai aktuali mano profesija - siuvėja.\n" +
    "    Vaikai labai greit auga ir reikia vis naujų rūbelių, o kai mama moka siūti - tai ne problema!\n" +
    "    Mano tikslas ne tik savo vaikučius papuošti, bet ir Jūsų.\n" +
    "    Todėl daugelis mano darbelių yra skirta vaikams, nors siuvu ir suaugusiems.";
var delay = 70; // greitis
var elem = document.getElementById("result");

var print_text = function(text, elem, delay) {
    if(text.length > 0) {
        elem.innerHTML += text[0];
        setTimeout(
            function() {
                print_text(text.slice(1), elem, delay);
            }, delay
        );
    }
}
print_text(text, elem, delay);

