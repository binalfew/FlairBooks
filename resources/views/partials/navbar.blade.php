<div class="navbar navbar-default mega-menu" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img id="logo-header" src="/images/logo.png" alt="Logo">
            </a>
        </div>

        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">            
                @foreach($bookCategories as $category)
                    <li><a href="/books/{{ $category->code }}" >{{ $category->name }}</a></li>
                @endforeach 
                <li><a href="#" class="active">Events</a></li>
                <li><a href="#" >Discussions</a></li>
                <li><a href="#" >Reviews</a></li>
                <li><a href="#" >Blog</a></li>
                <li><a href="#" >Picks</a></li>
                <li><a href="#" >Stores</a></li>          
            </ul>
        </div>
    </div>    
</div>