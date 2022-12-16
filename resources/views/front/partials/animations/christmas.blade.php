
<style>
@import url('https://fonts.cdnfonts.com/css/christbaumkugeln');
@import url('https://fonts.cdnfonts.com/css/the-perfect-christmas');
.background {
  overflow: hidden;
  background-color: #0c5436;
  width: 100vw;
  height: 100vh;
  display: flex;
  display: -webkit-box;
  display: -ms-flexbox;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}

.ball-wrapper {
  display: flex;
  display: -webkit-box;
  display: -ms-flexbox;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  height: 100vh;
  z-index: 2;
  -webkit-transform-origin: top;
  -ms-transform-origin: top;
  transform-origin: top;
  animation: pendulum 3.5s ease-in-out alternate infinite;
  -webkit-animation: pendulum 3.5s ease-in-out alternate infinite;
  margin-top: -30px;
}

@-webkit-keyframes pendulum {
  0% {
    -webkit-transform: rotate(15deg);
    transform: rotate(15deg);
  }
  50% {
    -webkit-transform: rotate(-15deg);
    transform: rotate(-15deg);
  }
  100% {
    -webkit-transform: rotate(15deg);
    transform: rotate(15deg);
  }
}
@keyframes pendulum {
  0% {
    -webkit-transform: rotate(15deg);
    transform: rotate(15deg);
  }
  50% {
    -webkit-transform: rotate(-15deg);
    transform: rotate(-15deg);
  }
  100% {
    -webkit-transform: rotate(15deg);
    transform: rotate(15deg);
  }
}
.ball {
  width: 20vw;
  height: 20vw;
  background: -webkit-radial-gradient(7vw 7vw, circle, #e30a2a, #000);
  -webkit-box-shadow: -10px 8px 20px 6px #3002026b, 10px 8px 20px 6px #3002026b;
  box-shadow: -10px 8px 20px 6px #3002026b, 10px 8px 20px 6px #3002026b;
  border-radius: 50%;
  z-index: 1;
}

.ball-wire {
  width: 0.2vw;
  height: 31vh;
  background: #87836d;
  background: -webkit-gradient(linear, left top, right top, from(#87836d), color-stop(63%, #e3dabf), to(#858164));
  background: -o-linear-gradient(left, #87836d 0%, #e3dabf 63%, #858164 100%);
  background: linear-gradient(90deg, #87836d 0%, #e3dabf 63%, #858164 100%);
  z-index: 0;
}

.cube {
  width: 4vw;
  height: 3vw;
  background: #87836d;
  background: -webkit-gradient(linear, left top, right top, from(#87836d), color-stop(63%, #e3dabf), to(#858164));
  background: -o-linear-gradient(left, #87836d 0%, #e3dabf 63%, #858164 100%);
  background: linear-gradient(90deg, #87836d 0%, #e3dabf 63%, #858164 100%);
  margin-bottom: -1vw;
  position: relative;
  z-index: -1;
}
.text{
    font-family: 'Christbaumkugeln', sans-serif;
    font-size: 400px;
    color: #ffffff;
    position: absolute;
    display: flex;  
    margin-top: -100px;
}

.p-message {
  font-weight: 700;
  text-align: center;
  font-size: 53px;
  font-family: 'The Perfect Christmas', sans-serif;    
  text-transform: uppercase;
  background: linear-gradient(90deg, #0c5436, #fff, #0c5436);
  letter-spacing: 5px;
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  background-repeat: no-repeat;
  background-size: 80%;
  animation: shine 10s linear infinite;
  position: relative;
  margin-top: 30%;
  z-index: 999;
}

@keyframes shine {
  0% {
    background-position-x: -500%;
  }
  100% {
    background-position-x: 500%;
  }
}

@media (max-width: 768px) {
    .text{
        font-size: 125px;
        align-items: center;
    }
    .ball-wrapper {
      height: 75vh;
    }
    .ball {
      height: 25vw;
      width: 25vw;
    }
    .p-message {
      font-size: 40px;
      margin-top: 80%;
      animation: shine 10s cubic-bezier(0.41, 0.5, 0.55, 0.06) infinite;
    }
}
</style>

  <section class="background">

    <h2 class="text">2
        <div class="ball-wrapper">
            <div class="ball-wire"></div>
            <div class="cube"></div>
            <div class="ball"></div>
        </div>
        23
    </h2>
    <p class="p-message">Feliz Navidad Y Prospero Año Nuevo Les Desea Bisturí Noticias</p>
  </section>

