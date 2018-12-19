function exchange(bedrag, valuta) {
    if(valuta == "dollar/euro") {
        bedrag = bedrag * euro_dollarkoers();        
    } else if(valuta == "euro/dollar") {
        bedrag = bedrag * dollar_eurokoers();
    } else if(valuta == "roebel/euro") {
        bedrag = bedrag * euro_roebelkoers();
    } else {
        bedrag = bedrag * roebel_eurokoers();
    }
    return(bedrag);
}

//Converteerders

function euro_dollarkoers() {
    return(1.36);
}

function dollar_eurokoers() {
    return(0.74);
}

function euro_roebelkoers() {
    return(48.40);
}

function roebel_eurokoers() {
    return(0.02);
}