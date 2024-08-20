<x-app>
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">
    <div class="container">
        <h1 style="text-align: center">Bienvenidos</h1>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1800">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="https://www.dongee.com/tutoriales/content/images/2024/06/image-86.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://media.licdn.com/dms/image/D4E12AQEWzHellElPvg/article-cover_image-shrink_720_1280/0/1700245130014?e=2147483647&v=beta&t=c6bB9rPFcH9n4SVjaGbGVNY6WVbnlKQv1xX44CWXUkU" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://www.simplilearn.com/ice9/free_resources_article_thumb/difference_between_sql_and_mysql.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
</x-app>