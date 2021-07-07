@extends('layouts.app')

@section('content')

<div id="example"></div>
<script src="../js/app.js"></script>
@endsection

<style type="text/css">
    .pagination > li {
  display: inline-block;
  padding-left: 0;
}
.pagination > li {
  list-style: none;
  border: 0.9px solid;
}
.pagination > li > a,
.pagination > li > span {
  position: relative;
  float: left;
  padding: 6px 12px;
  line-height: 1.42857143;
  text-decoration: none;
  color: #2c689c;
  background-color: #fff;
  border: 1px solid #ddd;
  margin-left: -1px;
}

.pagination>li.active>a {
  color: #fff;
  background-color: #218838;
  border-color: #1e7e34;
}

/* Style the active class (and buttons on mouse-over) */
.pagination > li > a:hover {
  background-color:  #218838;
  color: white;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
  margin-left: 0;
    padding: 0px;
  border-bottom-left-radius: 4px;
  border-top-left-radius: 4px;
  display: none!important;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-bottom-right-radius: 4px;
  margin-right: 0;
  padding: 0px!important;
  border-top-right-radius: 4px;
  display: none!important;
}
</style>