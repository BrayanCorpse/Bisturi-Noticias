<style>
    @import url("https://fonts.googleapis.com/css2?family=Saira+Stencil+One&display=swap");

:root {
  --primary-color: #43A1C4;
}

.body {
  background-image: url("/img/ofrenda/background.svg");
  background-size: 50px;
  overflow: hidden;
}

.header {
  display: block;
  position: absolute;
  top: 0;
  right: 50px;
  left: 50px;
  height: 50px;
  background-color: var(--primary-color);
}

.side-left,
.side-right {
  display: block;
  position: absolute;
  top: 0;
  width: 50px;
  background-size: 50px;
  bottom: 0;
}

.side-right {
  right: 0;
  background-image: url("/img/ofrenda/side-right.svg");
}

.side-left {
  left: 0;
  background-image: url("/img/ofrenda/side-left.svg");
}

.footer {
  display: block;
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  height: 52px;
  background-image: url("/img/ofrenda/footer.svg");
  background-size: 35px;
  z-index: 2;
}

.grid-container {
  display: grid;
  margin: 50px 42px 0px;
  grid-template-columns: repeat(7, 1fr);
  grid-gap: 10px;
  justify-content: center;
  align-content: center;
  overflow: hidden;
}

.calavera-up,
.calavera-down,
.calavera-up:hover,
.calavera-down:hover {
  -webkit-transition: background 400ms ease-in-out;
  -moz-transition: background 400ms ease-in-out;
  -ms-transition: background 400ms ease-in-out;
  -o-transition: background 400ms ease-in-out;
  transition: background 400ms ease-in-out;
  width: 178px;
  height: 200px;
  background-size: 178px 200px;
  background-repeat: no-repeat;
  z-index: 1;
  cursor: pointer;
}

.calavera-up {
  background-image: url("/img/ofrenda/calavera-up.svg");
}

.calavera-up:hover {
  background-image: url("/img/ofrenda/calavera-up-hover.svg");
}

.calavera-down {
  background-image: url("/img/ofrenda/calavera-down.svg");
}

.calavera-down:hover {
  background-image: url("/img/ofrenda/calavera-down-hover.svg");
}

.text-trucazo {
  font-family: "Saira Stencil One", cursive;
  grid-column-start: 5;
  grid-column-end: 8;
  background-color: var(--primary-color);
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 3.2em;
  text-align: center;
  color: white;
  line-height: 1;
}

@media (max-width: 766px) {
  .four,
  .three,
  .two,
  .one {
    display: none;
  }

  .text-trucazo {
    grid-column-start: 2;
    grid-column-end: 7;
    font-size: 1.6em;
    text-align: center;
  }
}

@media (min-width: 767px) and (max-width: 942px) {
  .four,
  .three {
    display: none;
  }

  .text-trucazo {
    grid-column-start: 3;
    grid-column-end: 7;
  }
}

@media (min-width: 943px) and (max-width: 1114px) {
  .four {
    display: none;
  }

  .text-trucazo {
    grid-column-start: 4;
    grid-column-end: 7;
  }
}

@media (min-width: 1115px) and (max-width: 1299px) {
  .four {
    display: none;
  }

  .text-trucazo {
    grid-column-start: 4;
    grid-column-end: 8;
  }
}

@media (min-width: 1300px) {
}

</style>

<section class="body">
    <div class="header"></div>
    <div class="side-right"></div>
    <div class="side-left"></div>
    <div class="footer"></div>
    
    <div class="grid-container">
      <div class="calavera-up"></div>
      <div class="calavera-up"></div>
      <div class="calavera-up"></div>
      <div class="calavera-up"></div>
      <div class="calavera-up"></div>
      <div class="calavera-up"></div>
      <div class="calavera-up"></div>
      <div class="calavera-down one"></div>
      <div class="calavera-down two"></div>
      <div class="calavera-down three"></div>
      <div class="calavera-down four"></div>
      <div class="text-trucazo">
        <span class="text-trucazo-content">
          FELIZ DÍA DE MUERTOS <br>
            LES DESEA <br>
                BISTURÍ NOTICIAS
        </span>
      </div>
      <div class="calavera-up"></div>
      <div class="calavera-up"></div>
      <div class="calavera-up"></div>
      <div class="calavera-up"></div>
      <div class="calavera-up"></div>
      <div class="calavera-up"></div>
      <div class="calavera-up"></div>
      <div class="calavera-down"></div>
      <div class="calavera-down"></div>
      <div class="calavera-down"></div>
      <div class="calavera-down"></div>
      <div class="calavera-down"></div>
      <div class="calavera-down"></div>
      <div class="calavera-down"></div>
    </div>
</section>
