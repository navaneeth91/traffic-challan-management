<!DOCTYPE html>
<html>
  <head>
    <title>Slideshow Images</title>
    <style>
      body{
        background-color: #101010;
      }
      .slider {
        width: 700px;
        height: 300px;
        background-color: #101010;
        margin-left: auto;
        margin-right: auto;
        margin-top: 0px;
        text-align: center;
        overflow: hidden;
      }
      .image-container {
        width:2800px;
        background-color: pink;
        height: 400px;
        clear: both;
        position: relative;
        transition: left 2s;
        mix-blend-mode:screen;
      }
      .slide {
        float: left;
        margin: 0px;
        padding: 0px;
        position: relative;
      }
      #slide-1:target ~ .image-container {
        left: 0px;
      }
      #slide-2:target ~ .image-container {
        left: -700px;
      }
      #slide-3:target ~ .image-container {
        left: -1400px;
      }
      #slide-4:target ~ .image-container {
        left: -2100px;
      }
      .buttons {
        position: relative;
        top: -20px;
      }
      .buttons a {
        display: inline-block;
        height: 15px;
        width: 15px;
        border-radius: 50px;
        background-color: lightgreen;
      }
      
      /* Animation */
      .slider:hover .image-container {
        animation: slide 10s infinite; /* Change 6s to adjust speed */
      }
      @keyframes slide {
        0% { left: 0; }
        25% { left: -700px; }
        50% { left: -1400px; }
        75% { left: -2100px; }
        100% { left: 0; }
      }
    </style>
  </head>
  <body>
    <div class="slider">
      <span id="slide-1"></span>
      <span id="slide-2"></span>
      <span id="slide-3"></span>
      <span id="slide-4"></span>
      <div class="image-container">
        <img src="https://www.masslive.com/resizer/v2/https%3A%2F%2Fadvancelocal-adapter-image-uploads.s3.amazonaws.com%2Fimage.masslive.com%2Fhome%2Fmass-media%2Fwidth2048%2Fimg%2Fliving_impact%2Fphoto%2F22710590-standard.jpg?auth=3596e387ffb197402788c001878fec0b929fa155961fdccc5354f32154ae3c8c&width=1280&quality=90" class="slide" width="700" height="300" />
        <img src="https://i0.wp.com/drewsdecals.com/wp-content/uploads/2018/03/products-41q61PbKiNL.jpg?fit=400%2C209&ssl=1" class="slide" width="700" height="300" />
        <img src="https://thumbs.dreamstime.com/z/please-wear-your-seat-belt-safety-sign-214980540.jpg" class="slide" width="700" height="300" />
        <img src="https://th.bing.com/th/id/OIP.mt4U0gz8K-aBmq2eVQtligHaFn?rs=1&pid=ImgDetMain" class="slide" width="700" height="300" />
      </div>
    </div>
  </body>
</html>
