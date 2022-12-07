<section class="Loader">
    <div class="cubeWrap">
        <div class="cube">
        <div class="faces1"></div>
        <div class="faces2"></div>
        </div>
        <h2>Loading</h2>
    </div>
    </section>

    <style>
    .Loader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1000000000;
  font-family: "Josefin Sans", sans-serif;
  background: rgba(0,0,0,0.7);
  color: #fff;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  text-align: center;
  -webkit-transition: opacity 0.75s, visibility 0.75s;
  transition: opacity 0.75s, visibility 0.75s;
}

.Loader .cubeWrap {
  -webkit-perspective: 800px;
          perspective: 800px;
  width: 300px;
  overflow: hidden;
  position: absolute;
  -webkit-animation: bouncy 2s ease forwards;
  animation: bouncy 2s ease forwards;
}

.Loader .cubeWrap .cube {
  margin: 8em auto;
  width: 6em;
  height: 6em;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
  -webkit-transform-origin: 50% 50% -3em;
          transform-origin: 50% 50% -3em;
  position: relative;
  -webkit-animation: spin 6s linear infinite;
  animation: spin 6s linear infinite;
  -webkit-transform: rotateX(-50deg) rotateY(405deg);
          transform: rotateX(-50deg) rotateY(405deg);
}

.Loader .cubeWrap div {
  position: absolute;
  width: 6em;
  height: 6em;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}

.Loader .faces1::before,
.Loader .faces1::after,
.Loader .faces2::before,
.Loader .faces2::after {
  position: absolute;
  content: "";
  display: block;
  width: 100%;
  height: 100%;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}

.Loader .faces1::before,
.Loader .faces2::before {
  -webkit-transform: rotateY(90deg);
          transform: rotateY(90deg);
  -webkit-transform-origin: 0 50%;
          transform-origin: 0 50%;
  background-color: purple;
}

.Loader .faces2 {
  -webkit-transform: rotateX(180deg) translateZ(6em);
          transform: rotateX(180deg) translateZ(6em);
}

.Loader .faces2::before {
  background-color:#2ebd30 !important;
  -webkit-transform: rotateY(-90deg);
          transform: rotateY(-90deg);
  -webkit-transform-origin: 100% 50%;
          transform-origin: 100% 50%;
}

.Loader .faces1::after,
.Loader .faces2::after {
  -webkit-transform: rotateX(-90deg);
          transform: rotateX(-90deg);
  -webkit-transform-origin: 50% 0;
          transform-origin: 50% 0;
          background-color:#2ebd30 !important;
}

.Loader .faces1 {
  background-color:#2ebd30 !important;
}

.Loader .faces2 {
  background-color:#2ebd30 !important;
}

.Loader .faces1::before {
  background-color:#2ebd30 !important;
}

.Loader .faces2::before {
  background-color:#2ebd30 !important;
}

.Loader .faces1::after {
  background-color:#2ebd30 !important;
}

.Loader .faces2::after {
  background-color:#2ebd30 !important;
}

@-webkit-keyframes spin {
  0% {
    -webkit-transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
            transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
  }
  100% {
    -webkit-transform: rotateX(720deg) rotateY(360deg) rotateZ(0deg);
            transform: rotateX(720deg) rotateY(360deg) rotateZ(0deg);
  }
}

@keyframes spin {
  0% {
    -webkit-transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
            transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
  }
  100% {
    -webkit-transform: rotateX(720deg) rotateY(360deg) rotateZ(0deg);
            transform: rotateX(720deg) rotateY(360deg) rotateZ(0deg);
  }
}

@-webkit-keyframes bouncy {
  /* up */
  0% {
    -webkit-transform: translateY(-600px) scale(0.8, 1.2);
            transform: translateY(-600px) scale(0.8, 1.2);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
  /* floor */
  30% {
    -webkit-transform: translateY(0) scale(0.8, 1.2);
            transform: translateY(0) scale(0.8, 1.2);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  /* floor */
  32% {
    -webkit-transform: translateY(0) scale(1, 0.8);
            transform: translateY(0) scale(1, 0.8);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  /* up */
  45% {
    -webkit-transform: translateY(-100px) scale(0.9, 1.1);
            transform: translateY(-100px) scale(0.9, 1.1);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
  /* floor */
  60% {
    -webkit-transform: translateY(0) scale(0.9, 1.1);
            transform: translateY(0) scale(0.9, 1.1);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  /* floor */
  62% {
    -webkit-transform: translateY(0) scale(1, 0.9);
            transform: translateY(0) scale(1, 0.9);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  /* up */
  70% {
    -webkit-transform: translateY(-30px) scale(0.9, 1.1);
            transform: translateY(-30px) scale(0.9, 1.1);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
  /* floor */
  80% {
    -webkit-transform: translateY(0) scale(1, 1);
            transform: translateY(0) scale(1, 1);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  /* floor */
  82% {
    -webkit-transform: translateY(0) scale(1, 0.95);
            transform: translateY(0) scale(1, 0.95);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  /* up */
  85% {
    -webkit-transform: translateY(-10px) scale(0.98, 1.02);
            transform: translateY(-10px) scale(0.98, 1.02);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
  /* floor */
  90% {
    -webkit-transform: translateY(0) scale(1, 1);
            transform: translateY(0) scale(1, 1);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  100% {
    -webkit-transform: translateX(-900px) scale(0.8, 1.2);
            transform: translateX(-900px) scale(0.8, 1.2);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
}

@keyframes bouncy {
  /* up */
  0% {
    -webkit-transform: translateY(-600px) scale(0.8, 1.2);
            transform: translateY(-600px) scale(0.8, 1.2);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
  /* floor */
  30% {
    -webkit-transform: translateY(0) scale(0.8, 1.2);
            transform: translateY(0) scale(0.8, 1.2);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  /* floor */
  32% {
    -webkit-transform: translateY(0) scale(1, 0.8);
            transform: translateY(0) scale(1, 0.8);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  /* up */
  45% {
    -webkit-transform: translateY(-100px) scale(0.9, 1.1);
            transform: translateY(-100px) scale(0.9, 1.1);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
  /* floor */
  60% {
    -webkit-transform: translateY(0) scale(0.9, 1.1);
            transform: translateY(0) scale(0.9, 1.1);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  /* floor */
  62% {
    -webkit-transform: translateY(0) scale(1, 0.9);
            transform: translateY(0) scale(1, 0.9);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  /* up */
  70% {
    -webkit-transform: translateY(-30px) scale(0.9, 1.1);
            transform: translateY(-30px) scale(0.9, 1.1);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
  /* floor */
  80% {
    -webkit-transform: translateY(0) scale(1, 1);
            transform: translateY(0) scale(1, 1);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  /* floor */
  82% {
    -webkit-transform: translateY(0) scale(1, 0.95);
            transform: translateY(0) scale(1, 0.95);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  /* up */
  85% {
    -webkit-transform: translateY(-10px) scale(0.98, 1.02);
            transform: translateY(-10px) scale(0.98, 1.02);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
  /* floor */
  90% {
    -webkit-transform: translateY(0) scale(1, 1);
            transform: translateY(0) scale(1, 1);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
  100% {
    -webkit-transform: translateX(-900px) scale(0.8, 1.2);
            transform: translateX(-900px) scale(0.8, 1.2);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
}

.Loader-none {
  opacity: 0;
  visibility: hidden;
}
.Loader h2{
    color :#fff;
}

    </style>


    <script>
        //  Fun Loading WebSite
        Loading = () =>{
        window.addEventListener("load", () => {
            let Loader = document.querySelector(".Loader");
            setTimeout(() => {
            Loader.classList.add('Loader-none');
            }, 1000);
        });
        }
        Loading()  
      
    </script>