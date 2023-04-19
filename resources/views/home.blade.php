@extends('layouts.app')

@section('title')
<div class="position-absolute top-50 start-50 translate-middle">
   <div class="container">
      <div class="col-md-12 ct-content">
         <form id="searchForm" action="google-search.html">
            <div class="row">
               <div class="col-md-10 col-sm-12">
                  <input id="txtSearchTerm" name="q" class="search-page-search" placeholder="What are you looking for?" value="">
               </div>
               <div class="col-md-2 col-sm-12">
                  <input type="submit" onClick="javascript:JSFiddleSubmit();return false;" class="search-page-search-submit" value="Search">
               </div>
            </div>
         </form>
         <div id="searchResult"></div>
         <div id="output"></div>
         <div class="pager_controls">
            <p>
               <a onclick="documentTrack('#');" href="#" id="lnkPrev" title="Display previous result page" style="display:none;">Previous</a> <a onclick="documentTrack('#');" href="#" id="lnkNext" title="Display next result page" style="display:none;">Next</a>
            </p>
         </div>
      </div>
   </div>
</div>
@endsection

@section('content')
<a1>TGFnmmm</a1>
@endsection