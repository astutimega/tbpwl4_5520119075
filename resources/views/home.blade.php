@extends('adminlte::page')

@section('title', 'MegSkin')

@section('content_header')
    <h1> Welcome to MegSkin</h1>
@stop

@section('content')
    @if($user->roles_id == 1)
    <div class="row">
  <div class="column">
    <img src="{{ 'vendor/adminlte/dist/img/sparkling.jpg' }}" alt="Nature" onclick="myFunction(this);">
 
  </div>
  <div class="column">
  <img src="{{ 'vendor/adminlte/dist/img/orchid.jpg' }}" alt="Snow" onclick="myFunction(this);">
  </div>
  <div class="column">
  <img src="{{ 'vendor/adminlte/dist/img/greentea.jpg' }}" alt="Mountains" onclick="myFunction(this);">
  </div>
  <div class="column">
  <img src="{{ 'vendor/adminlte/dist/img/cherry1.jpg' }}" alt="Lights" onclick="myFunction(this);">
  </div>
</div>

<!-- The expanding image container -->
<div class="container">
  <!-- Close the image -->
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

  <!-- Expanded image -->
  <img id="expandedImg" style="width:100%">

  <!-- Image text -->
  <div id="imgtext"></div>
</div>
    @else
    <div class="row">
  <div class="column">
    <img src="{{ 'vendor/adminlte/dist/img/sparkling.jpg' }}" alt="Nature" onclick="myFunction(this);">
 
  </div>
  <div class="column">
  <img src="{{ 'vendor/adminlte/dist/img/orchid.jpg' }}" alt="Snow" onclick="myFunction(this);">
  </div>
  <div class="column">
  <img src="{{ 'vendor/adminlte/dist/img/greentea.jpg' }}" alt="Mountains" onclick="myFunction(this);">
  </div>
  <div class="column">
  <img src="{{ 'vendor/adminlte/dist/img/cherry1.jpg' }}" alt="Lights" onclick="myFunction(this);">
  </div>
</div>

<!-- The expanding image container -->
<div class="container">
  <!-- Close the image -->
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

  <!-- Expanded image -->
  <img id="expandedImg" style="width:100%">

  <!-- Image text -->
  <div id="imgtext"></div>
</div>
    @endif
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.4.7
    </div>
    <strong>CopyRight &copy; {{date('Y')}}
    <a href="#" target="_blank">MegSkin</a>.</strong> All Right reserved
@stop

@section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">

        <style>
        /* The grid: Four equal columns that floats next to each other */

        h1{
          text-align: center;
    
        }
.column {
  float: left;
  width: 25%;
  padding: 10px;
}

/* Style the images inside the grid */
.column img {
  opacity: 0.8;
  cursor: pointer;
}

.column img:hover {
  opacity: 1;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The expanding image container (positioning is needed to position the close button and the text) */
.container {
  position: relative;
  display: none;
}

/* Expanding image text */
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: white;
  font-size: 20px;
}

/* Closable button inside the image */
.closebtn {
  position: absolute;
  top: 10px;
  right: 15px;
  color: white;
  font-size: 35px;
  cursor: pointer;
}
        </style>
@stop

@section('js')
        <script>console.log ('Hi!')</script>

        <script>
            function myFunction(imgs) {
  // Get the expanded image
  var expandImg = document.getElementById("expandedImg");
  // Get the image text
  var imgText = document.getElementById("imgtext");
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.alt;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
}


        </script>
@stop