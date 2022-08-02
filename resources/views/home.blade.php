@extends('layouts.master_dashboard')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
         <div class="row">
           <div class="col-lg-4 col-6">
             <div class="small-box bg-info">
               <div class="inner">
                 <h3>{{number_format($AsetMasuk)}}</h3>
                 <p>Aset Masuk</p>
               </div>
               <div class="icon">
                 <i class="fas fa-boxes-alt"></i>
               </div>
               <a href="{{route('data.aset.masuk')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
               </a>
             </div>
           </div>
           <div class="col-lg-4 col-6">
             <div class="small-box bg-success">
               <div class="inner">
                 <h3>{{number_format($AsetKeluar)}}
                 </h3>
                 <p>Aset Keluar</p>
               </div>
               <div class="icon">
                 <i class="fas fa-boxes-alt"></i>
               </div>
               <a href="{{route('data.aset.keluar')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
               </a>
             </div>
           </div>
           <div class="col-lg-4 col-6">
             <div class="small-box bg-warning">
               <div class="inner">
                 <h3>{{number_format($permintaan_aset)}}</h3>
                 <p>Permintaan Aset</p>
               </div>
               <div class="icon">
                 <i class="fas fa-hand-holding-box"></i>
               </div>
               <a href="{{route('pengajuan.aset')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
               </a>
             </div>
           </div>
         </div>  
</div>
@endsection
