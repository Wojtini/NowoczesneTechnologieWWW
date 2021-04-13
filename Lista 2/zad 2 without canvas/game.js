//Pozycja pustego
var redTile;
//Size of square
var n = 4
var arr = []
var currentRedX = -1
var currentRedY = -1

class gameTile {
  constructor(x, y, elem) {
    this.orgx = x;
    this.orgy = y;
    this.x = x;
    this.y = y;
    this.element = elem;
    this.updateElement();
  }

  changePos(x, y){
    this.x = x;
    this.y = y;
    this.updateElement();
  }

  updateElement(){
    var test = this.y*-100 + "px " + this.x*-100 + "px";
    this.element.style.backgroundImage = "url('images/puzzle.jpg')";
    this.element.style.backgroundPosition = test;
  }

  changeToRed(){
    this.element.style.backgroundImage = "url('images/red.png')";
  }
}

function myFunction() {
  n = document.getElementById("myText").value;
  document.getElementById("demo").innerHTML = "Gra wystartowana";
  var element = document.getElementById("game");
  //var text = document.createTextNode("img src='http://i.stack.imgur.com/ArS4Q.jpg' alt='c'");

  for( i = 0; i < n; i++){
    var tag = document.createElement("div");
    tag.className = "flex-container"
    var arrpom = [];
    for (j = 0; j < n; j++) {
      var img = document.createElement("div");
      img.className = "imageholder"

      img.style.backgroundSize = n*100 + "px " + n*100 + "px";
      tag.appendChild(img);


      var pom = new gameTile(i,j,img);
      img.addEventListener("click", onClick);


      arrpom[j] = pom;
    }
    arr[i] = arrpom;
    element.appendChild(tag);
  }
  createNewRed();
  randomize();
  swapWithRed(0,0);
}

function onClick(event){
  var pom = event.target;
    for( i = 0; i < n; i++){
      for (j = 0; j < n; j++) {
        if(arr[i][j].element==pom){
          clickedPos(i,j);
        }
      }
    }
}
//&& checkIfNeighboursRedTile(i,j)
function clickedPos(i, j){
  if(arr[i][j] != redTile && checkIfNeighboursRedTile(i,j)){
    swapWithRed(i,j);
  }
}

function swapWithRed(i, j){
    var pastRedX = redTile.x;
    var pastRedY = redTile.y;
    redTile.changePos(arr[i][j].x,arr[i][j].y)
    arr[i][j].changePos(pastRedX,pastRedY)


    redTile = arr[i][j];
    currentRedX = i;
    currentRedY = j;
    redTile.changeToRed();
}

function checkIfNeighboursRedTile(x,y){
  if(currentRedX == x+1 && currentRedY == y){
    return true
  }else if (currentRedX == x-1 && currentRedY == y) {
    return true
  }else if (currentRedX == x && currentRedY == y+1) {
    return true
  }else if (currentRedX == x && currentRedY == y-1) {
    return true
  }
  return false
}

function randomize(){
  var r = 1000; //how many times it will change something
    // clickedPos(currentRedX+1,currentRedY);
  for (i = 0;i<r;i++){
    var side = Math.floor(Math.random() * 4);
    if(side==0){ //UP
      if(currentRedX!=0){
        clickedPos(currentRedX-1,currentRedY);
      }
    }else if (side==1) { //Down
      if(currentRedX!=n-1){
        clickedPos(currentRedX+1,currentRedY);
      }
    }else if(side==2){ //Left
      if(currentRedY!=0){
        clickedPos(currentRedX,currentRedY-1);
      }
    }else if (side==3) { //Right
      if(currentRedY!=n-1){
        clickedPos(currentRedX,currentRedY+1);
      }
    }
  }

}

function createNewRed(){
  arr[0][0].changeToRed();
  currentRedX = 0;
  currentRedY = 0;
  redTile = arr[0][0];
  return;
}
