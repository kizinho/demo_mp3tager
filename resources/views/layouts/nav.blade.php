
<div class="navigation container">
        <nav class="navbar navbar-expand-lg navbar-light px-0">
            <a class="navbar-brand logo" href="{{url('/')}}">
                <img src="{{url(config('app.logo'))}}" width='50'  height="50" class=" logo__icon">
               {{config('app.name')}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                 
                    <li class="nav-item @if(request()->path() == '/') active @endif">
                        <a class="nav-link" href="{{url('upload')}}">Start Editing</a>
                    </li>
                      <li class="nav-item @if(request()->path() == 'image-editing') active @endif">
                        <a class="nav-link" href="{{url('image-editing')}}">Image Editing</a>
                    </li>
                    <li class="nav-item @if(request()->path() == 'my-files') active @endif">
                        <a class="nav-link" href="{{url('my-files')}}">My Files</a>
                    </li>
                       <li class="nav-item">
                        <a class="nav-link cache" href="{{url('cache-clear')}}">Clear Cache</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link update" href="{{url('update-tager')}}">Update Tager</a>
                    </li>
                     <li id="google_translate_element"></li>
                </ul>
                
            </div>
        </nav>
    </div>