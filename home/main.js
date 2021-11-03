console.log("HelloMain");

function searchBar(){
    console.log("searchbar ok")
}

function addTask(){
    console.log("addtask ok");
}

function openNotif(){
    console.log("notif ok");
}

function openProfil(){
    console.log("profil ok");
}

function deconnect(){
    console.log("deconnect ok");
    document.location.href = "../connect/index.php";
}

function shortWay(){
    console.log("shortWay ok");
}

function reloadAccueil(){
    console.log("reload accueil ok");
}

function leftButton(){
    // Comment JS récupère l'ID sur l'index ?
    let previousDay = (- 1);
    let id = 'eec9377a2f8a3b4695107ab39e0a0037';
    document.location.href = '../home/index.php?previousDay=' + previousDay + '&id=' + id;
}

function rightButton(){
    // Comment JS récupère l'ID sur l'index ?
    let nextDay = 1;
    let id = 'eec9377a2f8a3b4695107ab39e0a0037';
    document.location.href = '../home/index.php?nextDay=' + nextDay + '&id=' + id;
}

function deleteTask(){
    console.log("deleteTask ok");
}

function doneTask(){
    console.log("doneTask ok");
}


