//Ši funkcija yra skirta rodyti skaitmeninį laikrodį interneto svetainėje. Ji naudoja JavaScript, kad gautų dabartinę
// datą ir laiką iš vartotojo kompiuterio ir juos atvaizduotų puslapio elemente su id "digital_watch".
// Funkcijos veikimo principas yra toks: paimamas dabartinis laikas, t.y. valandos, minutės ir sekundės, o po to
// patikrinama, ar reikia pridėti nulį prie valandų, minutės ar sekundės skaičiaus, jei jie yra mažesni nei 10. Tada
// laikrodis atvaizduojamas puslapio elemente su formatu "valandos:minutės:sekundės".
// Galų gale, funkcija naudoja setTimeout() metodą, kad periodiškai atnaujintų laikrodį kas sekundę, kol vartotojas
// išjungs svetainę.
function digitalWatch() {
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();
    if (hours < 10) hours = "0" + hours;
    if (minutes < 10) minutes = "0" + minutes;
    if (seconds < 10) seconds = "0" + seconds;
    document.getElementById("digital_watch").innerHTML = hours + ":" + minutes + ":" + seconds;
    setTimeout("digitalWatch()", 1000);
}
