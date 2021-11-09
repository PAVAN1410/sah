<style>
    .tech-slideshow {
        height: 200px;
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
        transform: translate3d(0, 0, 0);
    }

    .tech-slideshow>div {
        height: 200px;
        width: 2526px;
        background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/collage.jpg);
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        transform: translate3d(0, 0, 0);
    }

    .tech-slideshow .mover-1 {
        animation: moveSlideshow 12s linear infinite;
    }

    .tech-slideshow .mover-2 {
        opacity: 0;
        transition: opacity 0.5s ease-out;
        background-position: 0 -200px;
        animation: moveSlideshow 15s linear infinite;
    }

    .tech-slideshow:hover .mover-2 {
        opacity: 1;
    }

    @keyframes moveSlideshow {
        100% {
            transform: translateX(-66.6666%);
        }
    }
</style>
<div class="tech-slideshow">
    <div class="mover-1"></div>
    <div class="mover-2"></div>
</div>