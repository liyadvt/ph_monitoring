    @extends('component.sidebar')
    
    @section('content')

    <div class="m-2">
        <div class="username my-2"><h4>Dashboard</h4></div>

        <div>
            <div class="my-2"><h4>Welcome {{ $username  }} !</h4></div>
            
            <div class="card mx-4 mt-3" style="width: 18rem;">
                <div class="card-body">
                    <img src="{{ asset('../assets/img/icon/icon.png') }}" alt="">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        
    </div>
    

    @endsection
