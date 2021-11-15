console.log("HelloMain");


function searchBar(){
    console.log("searchbar ok")
}

function addTask(){
    let userID = document.getElementById("userID");
    document.location.href = '../home/add.php?id=' + userID.innerHTML + '&task=add';
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
    let userID = document.getElementById("userID");
    document.location.href = '../home/index.php?id=' + userID.innerHTML + '&display=previous';
}

function rightButton(){
    let userID = document.getElementById("userID");
    document.location.href = '../home/index.php?id=' + userID.innerHTML + '&display=next';
}

function deleteTask(){
    console.log("deleteTask ok");
}

function doneTask(){
    console.log("doneTask ok");
}
