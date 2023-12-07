<div>
    <div style="margin-bottom: 30px">
        <div class="dashboard_content_middle_left_filters">
            {{ print_r($month) }}
            <div class="tests_graphik_filter_filters" style="    width: 60%;
            height: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;">
                @csrf
                    <div class="position-sector_select test-graphic-select">
                      <label for="select" class="position-sector_select-label">Город: </label>
                      <select id="filterByLocation" name="competetions" class="position-sector_select-sel" style="width:90px">
                          <option selected value="all">Все</option>
                          @foreach ($locations as $location)
                          <option value="{{ $location }}">{{ $location }}</option>
                              
                          @endforeach
                      </select>
                    </div>
    
                    <div class="position-sector_select test-graphic-select">
                    <label for="select" class="position-sector_select-label">От: </label>
                    <input od type="date" name="" id="filterByDateFrom">
                    </div>
                    <div class="position-sector_select test-graphic-select">
                        <label for="select" class="position-sector_select-label">До: </label>
                        <input type="date" name="" id="filterByDateTo">
                    </div>
                        <button onclick="filterGraphick()">применить фильтр</button>
               
            </div>
        </div>
        <div class="dashboard_content_middle_left">
     
            <div>
                <canvas width="2200" height="800" id="myChart" style="display: block;width:1100px;height:400px;box-sizing:border-box;"></canvas>
            </div>   
        </div>    
    </div>
</div>

</div>