<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar nav-legacy nav-flat flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li> 
      
          @if(auth()->user()->role == 'admin' || auth()->user()->role == 'ketua_upt')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                 Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                       Data Aset
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('data.aset.masuk')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Aset Masuk</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('data.aset.keluar')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Aset Keluar</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('data.aset')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Aset</p>
                      </a>
                    </li> 
                  

                   
                  </ul>

                    @if(auth()->user()->role == 'admin')
                            <li class="nav-item">
                              <a href="{{route('pengguna')}}" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Data User</p>
                              </a>
                            </li> 
                          
                    @endif 
                    @if(auth()->user()->role == 'admin')
                    <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-server"></i>
                            <p>
                               Data Lainnya
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                           

                             
                              <li class="nav-item">
                              <a href="{{route('kategori.aset')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kategori</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="{{route('jenis.aset')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Jenis</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="{{route('satuan.aset')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Satuan</p>
                              </a>
                            </li>
                          
                          </ul>
                            @endif
            </ul>
          </li> 
          @endif
         @if(auth()->user()->role == 'unit_kerja' || auth()->user()->role == 'admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-truck-loading"></i>
              <p>
                 Permintaan Aset
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(auth()->user()->role == 'admin')
              <li class="nav-item">
                <a href="{{route('pengajuan.aset')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Permintaan Aset</p>
                </a>
              </li>
              @endif
                @if(auth()->user()->role == 'unit_kerja')
              <li class="nav-item">
                <a href="{{route('pengajuan.aset.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Permintaan Aset</p>
                </a>
              </li> 
               <li class="nav-item">
                <a href="{{route('pengajuan.aset.self')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan aset Saya</p>
                </a>
              </li> 
               @endif
            </ul>
          </li>
          @endif
          @if(auth()->user()->role == 'ketua_upt' || auth()->user()->role == 'admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                 Laporan Aset
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               @if(auth()->user()->role == 'ketua_upt')
              <li class="nav-item">
                <a href="{{route('pengajuan.laporan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Laporan Aset</p>
                </a>
              </li>
              @endif
              @if(auth()->user()->role == 'admin')
              <li class="nav-item">
                <a href="{{route('pengajuan.laporan.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajukan Laporan Aset</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="{{route('pengajuan.laporan.self')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Saya</p>
                </a>
              </li> 
              @endif
            </ul>
          </li>
          @endif
      
           
        </ul>
      </nav>