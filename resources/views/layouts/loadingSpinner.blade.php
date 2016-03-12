<style media="screen">
    .ball {
        background-color: rgba(0,0,0,0);
        border: 5px solid rgba(0,0,0,0.9);
        opacity: .9;
        border-top: 5px solid rgba(0,0,0,0);
        border-left: 5px solid rgba(0,0,0,0);
        border-radius: 50px;
        box-shadow: 0 0 35px #2187e7;
        width: 50px;
        height: 50px;
        margin: 0 auto;
        -moz-animation: spin .5s infinite linear;
        -webkit-animation: spin .5s infinite linear;
      }

      .ball1 {
        background-color: rgba(0,0,0,0);
        border: 5px solid rgba(0,0,0,0.9);
        opacity: .9;
        border-top: 5px solid rgba(0,0,0,0);
        border-left: 5px solid rgba(0,0,0,0);
        border-radius: 50px;
        box-shadow: 0 0 15px #2187e7;
        width: 30px;
        height: 30px;
        margin: 0 auto;
        position: relative;
        top: -40px;
        -moz-animation: spinoff .5s infinite linear;
        -webkit-animation: spinoff .5s infinite linear;
      }

      @-moz-keyframes spin {
        0% {
            -moz-transform: rotate(0deg);
        }

        100% {
            -moz-transform: rotate(360deg);
        };
      }

      @-moz-keyframes spinoff {
        0% {
            -moz-transform: rotate(0deg);
        }

        100% {
            -moz-transform: rotate(-360deg);
        };
      }

      @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        };
      }

      @-webkit-keyframes spinoff {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(-360deg);
        };
      }


      .loadingDiv{
            background-color: #FFF;
            opacity: 0.4;
            width: 100%;
            height: 100%;
            display:none;
            position: fixed;
            top: 0px;
      }

      .loadingHolder{
        position: fixed;
        top: 42%;
        left: 0%;
        right: 0;
        margin: 0 auto;
      }
    </style>
<div class="loadingDiv">

  <div class="loadingHolder">
    <div class="ball"></div>
    <div class="ball1"></div>
  </div>

</div>
