<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('../DashTemp/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('../DashTemp/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{asset('../DashTemp/css/font.css')}}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('../DashTemp/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('../DashTemp/css/custom.css')}}">
    <!-- Favicon-->
    <!-- <link rel="shortcut icon" href="{{asset('../DashTemp/img/favicon.ico')}}"> -->
    <link rel="shortcut icon" href="{{asset('images/ist.png') }}" type="image/png">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->

<style>
  .statistics-block
  {
    background: red;
    color: white;
  }
  .borrow-request-preview {
    max-height: 200px;
    overflow-y: auto;
  }

  .borrow-request-preview table {
    width: 100%;
    table-layout: auto;
  }

  .borrow-request-preview thead {
    position: sticky;
    top: 0;
    background: red;
  }

  .cat_table {
          text-align: center;
          margin: auto;
          width: 100%;
        }
        th {
          background: red;
          color: white;
        }
        tr{
          color: grey;
        }
        .img_book {
          width: 80px;
          height: auto;
        }
        table {
          width: 100%;
        }
        .filter-form {
          margin-bottom: 20px;
          text-align: center;
        }
        .filter-form input,
        .filter-form select {
          margin: 5px;
          padding: 5px;
          border-radius: 5px;
          border: 1px solid #ccc;
        }
        .filter-form button {
          padding: 5px 10px;
          border-radius: 5px;
          border: none;
          background-color: #b5406c;
          color: #fff;
          cursor: pointer;
        }
        .btn-sm:disabled {
          pointer-events: none;
          opacity: 0.5;
          color: #aaa; /* Optional: change the color to a lighter grey */
        }
        @media (max-width: 768px) {

          .filter-form input,
          .filter-form select,
          .filter-form button {
            width: 100%;
            margin: 5px 0;
          }

        }
</style>
