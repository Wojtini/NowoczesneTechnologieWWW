//Pozycja pustego
var redTile;
//Size of square
var n = 0
var destWidth;
var destHeight;
var arr = []
var currentRedX = -1
var currentRedY = -1

class gameTile {
  constructor(x, y) {
    this.orgx = x;
    this.orgy = y;
    this.x = x;
    this.y = y;
    this.highlight = false;
  }

  changePos(x, y){
    this.x = x;
    this.y = y;
  }

}

var canvas;
window.onload = function(){

  canvas = document.getElementById('myCanvas');
  canvas.addEventListener("click", (event) => {
    onClick(event);
  });

  canvas.addEventListener('mousemove', function(event) {
    if(n==0){
      return
    }
    var x;
    var y;
    var val = eventToCanvasPos(event);
    x = val[0];
    y = val[1];
    // console.log("Well " + x + " " + y)
    // document.getElementById("myText").value = "Well " + x + " " + y;
    var x2 = Math.floor(x/destWidth);
    var y2 = Math.floor(y/destHeight);


    resetHighlights();
    if(checkIfNeighboursRedTile(x2,y2)){
      arr[x2][y2].highlight = true;
    }
    repaint();

}, false);
}

function resetHighlights(){
  for( i = 0; i < n; i++){
    for (j = 0; j < n; j++) {
      arr[i][j].highlight = false;
    }
  }
}

function myFunction() {
  n = document.getElementById("myText").value;
  document.getElementById("demo").innerHTML = "Gra wystartowana";
  for( i = 0; i < n; i++){
    arrpom = [];
    for (j = 0; j < n; j++) {
      arrpom[j] = new gameTile(i,j);
    }
    arr[i] = arrpom;
  }

  createNewRed();
  repaint();
  randomize();
    // swapWithRed(0,0);
}

function repaint(){
  var canvas = document.getElementById('myCanvas');
  var context = canvas.getContext('2d');
  context.globalAlpha = 1.0;
  var imageObj = new Image();
  imageObj.src = "images/puzzle.jpg"
  imageObj.onload = function() {
  //Szerokosc i wysokosc tego elementu
  destWidth = 500/n;
  destHeight = 500/n;
  for( i = 0; i < n; i++){
    for (j = 0; j < n; j++) {
        // context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, i*100, j*100, destWidth, destHeight); // old one

        // draw cropped image
        //Przycinanie
        var sourceX = arr[i][j].x*this.width/n;
        var sourceY = arr[i][j].y*this.height/n;
        //Szerokosc i wysokosc przyciecia
        var sourceWidth = this.width/n;
        var sourceHeight = this.height/n;
        // pozycja na canvasie
        var destX = i*destWidth;
        var destY = j*destHeight;
        // console.log("new! " + destX + " " + destY);
        context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);

        if (arr[i][j].highlight) {
          // console.log("nice" + i*destWidth + " " + j*destHeight);
          context.globalAlpha = 0.5;
          context.fillStyle = "blue";
          context.fillRect(i*destWidth, j*destHeight, 500/n, 500/n);
        }
      }
    }
  };
  context.globalAlpha = 1.0;

  var imageObj2 = new Image();
  imageObj2.src = "images/red.png"
  imageObj2.onload = function() {
      // context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, i*100, j*100, destWidth, destHeight); // old one

      // draw cropped image
      //Przycinanie
      var sourceX = redTile.x*this.width/n;
      var sourceY = redTile.y*this.height/n;
      //Szerokosc i wysokosc przyciecia
      var sourceWidth = this.width/n;
      var sourceHeight = this.height/n;
      //Szerokosc i wysokosc tego elementu
      var destWidth = 500/n;
      var destHeight = 500/n;
      // pozycja na canvasie
      var destX = currentRedX*destWidth;
      var destY = currentRedY*destHeight;
      context.drawImage(imageObj2, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
  };
}

function eventToCanvasPos(e){
  var x;
  var y;
  if (e.pageX || e.pageY) {
    x = e.pageX;
    y = e.pageY;
  }
  else {
    x = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
    y = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
  }
  x -= canvas.offsetLeft;
  y -= canvas.offsetTop;
  return [x+1,y];
}

function checkIfWin(){
  for( i = 0; i < n; i++){
    for (j = 0; j < n; j++) {
      var a = arr[i][j];
      if(a.x != a.orgx || a.y != a.orgy){
        return;
      }
    }
  }
  document.getElementById("demo").innerHTML = "WYGRANA!!!!";
}

function onClick(e){
  var x;
  var y;
  var val = eventToCanvasPos(e);
  x = val[0];
  y = val[1];

  var x2 = Math.floor(x/destWidth);
  var y2 = Math.floor(y/destHeight);
  // console.log("test2 " + x2 + " " + y2)
  clickedPos(x2,y2);
  repaint();
  checkIfWin();
}

// //&& checkIfNeighboursRedTile(i,j)
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
  var r = n*n*n; //how many times it will change something
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
  //swapWithRed(0,0); risky

  //go up while can
  console.log(redTile.y);
  while (currentRedY != 0) {
    clickedPos(currentRedX,currentRedY-1);
    console.log("y");
  }
  //go left while can
  while (currentRedX != 0) {
    clickedPos(currentRedX-1,currentRedY);
    console.log("x");
  }
}

function createNewRed(){
  currentRedX = 0;
  currentRedY = 0;
  redTile = arr[0][0];
  return;
}
