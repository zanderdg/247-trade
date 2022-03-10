    <form class="col-md-3" id="filters">
        <h3 class="bbjj">Filter Your Leads</h3>
        <p class="not-get">Not getting the right leads?</p>
        <p class="ch-set">Change your setting</p>

        <h3 class="show-on">Show Only:</h3>

        <label class="check ">Featured Leads
            <input type="checkbox" name="show_only" value="featured">
            <span class="checkmark"></span>
        </label>
        <label class="check ">First to buy
            <input type="checkbox" name="show_only" value="first_buy">
            <span class="checkmark"></span>
        </label>
        <label class="check ">Leads with images
            <input type="checkbox" name="show_only" value="images">
            <span class="checkmark"></span>
        </label>
        <hr>

        {{--<h3 class="show-on">Timing:</h3>
        <label class="check ">Urgent
            <input type="radio" name="timing" value="Urgently">
            <span class="checkmark"></span>
        </label>
        <label class="check ">Within 2 days
            <input type="radio" name="timing" value="2 days+">
            <span class="checkmark"></span>
        </label>
        <label class="check ">Within 2 weeks
            <input type="radio" name="timing" value="2 weeks+">
            <span class="checkmark"></span>
        </label>
        <label class="check ">Within 2 months
            <input type="radio" name="timing" value="2 months+">
            <span class="checkmark"></span>
        </label>
        <label class="check ">I am flexible on start date
            <input type="radio"  name="timing" value="I am flexible on start date">
            <span class="checkmark"></span>
        </label>
        <br>

        <h3 class="show-on">Hiring Stage:</h3>
        <label class="check ">I'm ready to hire
            <input type="radio" name="stage" value="I'm ready to hire">
            <span class="checkmark"></span>
        </label>
        <label class="check ">I'm planning & budgeting
            <input type="radio" name="stage" value="I'm planning and budgeting">
            <span class="checkmark"></span>
        </label>
        <label class="check ">I need a quote for insurance purposes
            <input type="radio" name="stage" value="I need a quote for insurance purposes">
            <span class="checkmark"></span>
        </label>

        <br>

        <div class="row">
            <div class="col-sm-12">
                <h3 class="show-on">Budget:</h3>

                <label class="check ">Under £500
                    <input type="radio" name="amount" value="Under £500">
                    <span class="checkmark"></span>
                </label>
                <label class="check ">Under £1000
                    <input type="radio" name="amount" value="Under £1000">
                    <span class="checkmark"></span>
                </label>
                <label class="check ">Under £2000
                    <input type="radio" name="amount" value="Under £2000">
                    <span class="checkmark"></span>
                </label>
                <label class="check ">Under £8000
                    <input type="radio" name="amount" value="Under £8000">
                    <span class="checkmark"></span>
                </label>
                <label class="check ">Under £15000
                    <input type="radio" name="amount" value="Under £15000">
                    <span class="checkmark"></span>
                </label>
                <label class="check ">Over £30000
                    <input type="radio" name="amount" value="Over £30000">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div> 
        <hr>
        
         @if(isset($services))
            <h3 class="show-on">Services:</h3>

            @foreach ($services as $key => $service)
                <label class="check "> {{ ucfirst($service) }}
                    <input type="checkbox" name="service" value="{{ $service }}">
                    <span class="checkmark"></span>
                </label> 
            @endforeach

            <br>
        @endif --}}
        
    </form>