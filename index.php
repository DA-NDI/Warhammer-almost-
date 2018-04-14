<?php
require_once ('./Player.Class.php');
require_once ('./PlayerOne.Class.php');
require_once ('./PlayerTwo.Class.php');
session_start();
$PlayerOne = new PlayerOne("One");
$PlayerTwo = new PlayerTwo("Two");
$PlayerTwo->set_hp(5);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
canvas {
    border:1px solid #d3d3d3;
    background-color: #f1f1f1;
}
</style>
</head>
<body onload="startGame()">
<script>

var playerOneShip;
var playerTwoShip;
var obstacle;

function startGame($ship_select) {
	var mars_class = "Mars_class.png";
	var Grand_cruiser = "Executor_Class_Grand_Cruiser.png";
	var TotalDestroy = "TotalDestroy.png";
    playerOneShip = new component(50, 20, "Mars_Class.png", 10, 10, "image", "Player1");
    playerTwoShip = new component(50, 20, "Executor_Class_Grand_Cruiser.png", 1420, 960, "image", "Player2");
    obstacle = new component(100, 170, "RPzV8fB.png", 200, 300, "image", "obstacle_1");
    obstacle1 = new component(150, 150, "asteroid1.png", 400, 700, "image", "obstacle_2");
    background = new component(1500, 1000, "canvas_background.jpg", 0, 0, "image", "bg");
    myGameArea.start();
}

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 1500;
        this.canvas.height = 1000;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 50);
        var background = document.getElementById("canvas_background.jpg");
  //      console.log(backround);
  //		img.src = './canvas_background.jpg';
//        this.drawImage(img, 0, 0);
        },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
    stop : function() {
        clearInterval(this.interval);
    }
}

function component(width, height, color, x, y, type, id) {
    this.id = id;
    this.type = type;
    if (type == "image") {
        this.image = new Image();
        this.image.src = color;
    }
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;    
    this.x = x;
    this.y = y;    
	if (id == "Player1")
	{
		this.x1 = x;
		this.y1 = y;
	}
	else if (id == "Player2")
	{
		this.x1 = x;
		this.y1 = y;
	}

    this.update = function() {
    	getValue();
        ctx = myGameArea.context;
//        if (id = "beam")
//      	{
//    		console.log("+++++++++++++++++++++++");
//        		ctx.clearRect(10,500,500 ,20 );
//        	}
        if (type == "image") {
        	console.log("object:", this.id);
        	console.log("x = " + this.x + " y = " + this.y);
        	if ((this.x < 0 || this.x > 1500 || this.y > 1000 || this.y < 0 || ((this.x >= 200 && this.x <= 270) && (this.y >= 300 && this.y <= 470)) || ((this.x >= 400 && this.x <= 550) && (this.y >= 700 && this.y <= 850))) && (this.id == "Player1" || this.id == "Player2"))
        	{
        		if (this.id = "Player1")
        			alert("Player1 is dead!");
        		else if (this.id = "Player2")
        			alert("Player2 is dead");
        		this.speedX = 0;
        		myGameArea.stop();
        	}
            ctx.drawImage(this.image, 
                this.x, 
                this.y,
                this.width, this.height);
        } else {
        	
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
        }
    }
    this.newPos = function() {
        this.x += this.speedX;
        this.y += this.speedY;        
    }
}

function updateGameArea() {
    myGameArea.clear();
	background.newPos();
	background.update();
    obstacle.newPos();
    obstacle.update();
    obstacle1.newPos();
    obstacle1.update();
    playerOneShip.newPos();
    playerOneShip.update();
    playerTwoShip.newPos();
    playerTwoShip.update();
   	explosion1.update();
   	explosion2.update();
}

function moveup() {
    playerOneShip.speedY = -5; 
}

function movedown() {
    playerOneShip.speedY = 5; 
}

function moveleft() {
    playerOneShip.speedX = -5; 
}

function moveright() {
    playerOneShip.speedX = 5; 
}

function clearmove() {
    playerOneShip.speedX = 0; 
    playerOneShip.speedY = 0; 
}
function moveup2() {
	ctx = myGameArea.context;
	var canvas = document.getElementById('canvas');
//	var rect = this.getBoundingClientRect();
//	console.log(canvas);

    playerTwoShip.speedY = -5; 
}

function movedown2() {
    playerTwoShip.speedY = 5; 
}
function Laser(player) {
   

if (player == 1)
{
	explosion1 = new component(1500, 1000, "./explosion1.png", 0, 0, "image", "beam");

//	explosion1.update();
    alert("Player1 is dead!");
    	updateGameArea();
}
else if (player = 2)
{
	explosion1 = new component(1500, 1000, "./explosion2.png", 0, 0, "image", "beam");
	alert("Player2 is dead");
	updateGameArea();
}
myGameArea.stop();
}
function moveleft2() {
    playerTwoShip.speedX = -5; 
}

function moveright2() {
    playerTwoShip.speedX = 5;
}

function clearmove2() {
    playerTwoShip.speedX = 0; 
    playerTwoShip.speedY = 0; 
}

function getRandInteger(min, max) {
    var x = Math.floor(Math.random() * (max - min) + min);
    document.getElementById("dice").innerHTML = x;
}
function getValue()
{
	var x = document.getElementById("hp2").value;
	document.getElementById("hp2").innerHTML = x;
//	x = 5;
//	document.getElementById("hp2").innerHTML = 50;
//	document.getElementById("ret").innerHTML = x;
//	document.getElementById("ret").innerHTML = x;
}
//function setPlayer1() {
//	document.getElementById("Life1").innerHTML = x;
//	document.getElementById("Shield1").innerHTML = x;
//	document.getElementById("PP1").innerHTML = x;
//}
</script>
<div style="display: flex; justify-content:space-around;">
	<div>
	<p id="Player1">Player 1</p>
	<p id="Life1">Life: <span id="hp1"><?php echo $_SESSION['hp1'];?></span></p>
	<p id="Shield1">Shield: <span id="shield1"><?php echo $_SESSION['shield1'];?></span></p>
	<p id="Speed1">Speed: <span id="speed1"><?php echo $_SESSION['speed1'];?></span></p>
	<p id = "PP1">PP: <span id="pp1"><?php echo $_SESSION['pp1'];?></span></p>
</div>
	<div style="width:180px;">
	  <button onmousedown="moveup()" onmouseup="clearmove()" ontouchstart="moveup()">UP</button><br><br>
	  <button onmousedown="moveleft()" onmouseup="clearmove()" ontouchstart="moveleft()">LEFT</button>
	  <button onmousedown="moveright()" onmouseup="clearmove()" ontouchstart="moveright()">RIGHT</button><br><br>
	  <button onmousedown="movedown()" onmouseup="clearmove()" ontouchstart="movedown()">DOWN</button>
	  <button id="piu1" onclick="Laser(1)">PIU-PIU</button>
	</div>
	<div style="width:780px;">
		<div>Throw me</div>>
	  <button onclick="getRandInteger(1,7)">DICE</button>
	  <output name = "dice" value = 5 id="dice"></output>
	</div>
	<div>
		<p id="Player2">Player 2</p>
		<p id="Life2">Life: <output id="hp2" value="<?php echo $_SESSION['hp2'];?>"><?php echo $_SESSION['hp2'];?></span></p>
<!--		<p id="return">Ret: <output id="ret" value="getValue()"</p> -->
		<p id="Shield2">Shield: <span id="shield2"><?php echo $_SESSION['shield2'];?></span></p>
		<p id="Speed2">Speed: <span id="speed2"><?php echo $_SESSION['speed2'];?></span></p>
		<p id = "PP2">PP: <span id="pp2"><?php echo $_SESSION['pp2'];?></span></p>
	</div>
	<div style="width:180px;">
	  <button onmousedown="moveup2()" onmouseup="clearmove2()" ontouchstart="moveup2()">UP</button><br><br>
	  <button onmousedown="moveleft2()" onmouseup="clearmove2()" ontouchstart="moveleft2()">LEFT</button>
	  <button onmousedown="moveright2()" onmouseup="clearmove2()" ontouchstart="moveright2()">RIGHT</button><br><br>
	  <button onmousedown="movedown2()" onmouseup="clearmove2()" ontouchstart="movedown2()">DOWN</button>
	  <button id="piu2" onclick="Laser(2)">PIU-PIU</button>
	</div>
</div>
<p>Piu Piu Game.</p>

</body>
</html>