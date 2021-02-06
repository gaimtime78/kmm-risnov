@extends('layout.application')

@section('css')
  
@endsection

@section('content')

@include('layout.navbar')

<!-- START MAIN -->
<div id="main">
<!-- START WRAPPER -->
<div class="wrapper">
@include('layout.menu')
<p class="card-stats-title"><i class="mdi-social-group-add"></i> Halaman Dashboar Admin Pusat IRIS Universitas Sebelas Maret </p>
<div id="chart-dashboard">
    <div class="row">
        <div class="col s12 m8 l8">
            <div class="card">
                <div class="card-move-up waves-effect waves-block waves-light">
                    <div class="move-up cyan darken-1">
                        <div>
                            <span class="chart-title white-text">Data Dosen Aktif</span>
                            <div class="chart-revenue cyan darken-2 white-text">
                                <p class="chart-revenue-total">$4,500.85</p>
                                <p class="chart-revenue-per"><i class="mdi-navigation-arrow-drop-up"></i> 21.80 %</p>
                            </div>
                            <div class="switch chart-revenue-switch right">
                                <label class="cyan-text text-lighten-5">
                                    Month
                                    <input type="checkbox">
                                    <span class="lever"></span> Year
                                </label>
                            </div>
                        </div>
                        <div class="trending-line-chart-wrapper">
                            <canvas id="trending-line-chart" height="70"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
                    <div class="col s12 m3 l3">
                        <div id="doughnut-chart-wrapper">
                            <canvas id="doughnut-chart" height="200"></canvas>
                            <div class="doughnut-chart-status">4500
                                <p class="ultra-small center-align">Sold</p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m2 l2">
                        <ul class="doughnut-chart-legend">
                            <li class="mobile ultra-small"><span class="legend-color"></span>Mobile</li>
                            <li class="kitchen ultra-small"><span class="legend-color"></span> Kitchen</li>
                            <li class="home ultra-small"><span class="legend-color"></span> Home</li>
                        </ul>
                    </div>
                    <div class="col s12 m5 l6">
                        <div class="trending-bar-chart-wrapper">
                            <canvas id="trending-bar-chart" height="90"></canvas>                                                
                        </div>
                    </div>
                </div>

                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Revenue by Month <i class="mdi-navigation-close right"></i></span>
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th data-field="id">ID</th>
                                <th data-field="month">Month</th>
                                <th data-field="item-sold">Item Sold</th>
                                <th data-field="item-price">Item Price</th>
                                <th data-field="total-profit">Total Profit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>January</td>
                                <td>122</td>
                                <td>100</td>
                                <td>$122,00.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>February</td>
                                <td>122</td>
                                <td>100</td>
                                <td>$122,00.00</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>March</td>
                                <td>122</td>
                                <td>100</td>
                                <td>$122,00.00</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>April</td>
                                <td>122</td>
                                <td>100</td>
                                <td>$122,00.00</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>May</td>
                                <td>122</td>
                                <td>100</td>
                                <td>$122,00.00</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>June</td>
                                <td>122</td>
                                <td>100</td>
                                <td>$122,00.00</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>July</td>
                                <td>122</td>
                                <td>100</td>
                                <td>$122,00.00</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>August</td>
                                <td>122</td>
                                <td>100</td>
                                <td>$122,00.00</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Septmber</td>
                                <td>122</td>
                                <td>100</td>
                                <td>$122,00.00</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Octomber</td>
                                <td>122</td>
                                <td>100</td>
                                <td>$122,00.00</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>November</td>
                                <td>122</td>
                                <td>100</td>
                                <td>$122,00.00</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>December</td>
                                <td>122</td>
                                <td>100</td>
                                <td>$122,00.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>

    </div>
</div>
<!--chart dashboard end-->
<div id="row-grouping" class="section col-md-12">
    <h4 class="header">DataTables Row grouping</h4>
    <div class="row">
    <div class="col s12 m4 l3">
        <!-- <p>Although DataTables doesn't have row grouping built-in (picking one of the many methods available would overly limit the DataTables core), it is most certainly possible to give the look and feel of row grouping.</p> -->
    </div>
    <div class="col s12 m8 l9">
        <div id="data-table-row-grouping_wrapper" class="dataTables_wrapper"><div class="dataTables_length" id="data-table-row-grouping_length"><label>Show <div class="select-wrapper initialized"><span class="caret">▼</span><input type="text" class="select-dropdown" readonly="true" data-activates="select-options-bb40630f-8b5b-ec97-361d-f3864954d9eb" value="25"><ul id="select-options-bb40630f-8b5b-ec97-361d-f3864954d9eb" class="dropdown-content select-dropdown" style="width: 160px; position: absolute; top: 0px; left: 0px; opacity: 1; display: none;"><li class=""><span>10</span></li><li class=""><span>25</span></li><li class=""><span>50</span></li><li class=""><span>100</span></li></ul><select name="data-table-row-grouping_length" aria-controls="data-table-row-grouping" class="initialized"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></div> entries</label></div><div id="data-table-row-grouping_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="data-table-row-grouping"></label></div><table id="data-table-row-grouping" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="data-table-row-grouping_info" style="width: 100%;">
            <thead>
                <tr role="row"><th class="sorting" tabindex="0" aria-controls="data-table-row-grouping" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 195px;">Name</th><th class="sorting" tabindex="0" aria-controls="data-table-row-grouping" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 294px;">Position</th><th class="sorting" tabindex="0" aria-controls="data-table-row-grouping" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 63px;">Age</th><th class="sorting" tabindex="0" aria-controls="data-table-row-grouping" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 126px;">Start date</th><th class="sorting" tabindex="0" aria-controls="data-table-row-grouping" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 112px;">Salary</th></tr>
            </thead>
        
            <tfoot>
                <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
            </tfoot>
        
            <tbody>
            <tr class="group"><td colspan="5">Edinburgh</td></tr><tr role="row" class="odd">
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr><tr role="row" class="even">
                    <td>Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td>$433,060</td>
                </tr><tr role="row" class="odd">
                    <td>Sonya Frost</td>
                    <td>Software Engineer</td>
                    
                    <td>23</td>
                    <td>2008/12/13</td>
                    <td>$103,600</td>
                </tr><tr role="row" class="even">
                    <td>Quinn Flynn</td>
                    <td>Support Lead</td>
                    
                    <td>22</td>
                    <td>2013/03/03</td>
                    <td>$342,000</td>
                </tr><tr role="row" class="odd">
                    <td>Dai Rios</td>
                    <td>Personnel Lead</td>
                    
                    <td>35</td>
                    <td>2012/09/26</td>
                    <td>$217,500</td>
                </tr><tr role="row" class="even">
                    <td>Gavin Joyce</td>
                    <td>Developer</td>
                    
                    <td>42</td>
                    <td>2010/12/22</td>
                    <td>$92,575</td>
                </tr><tr role="row" class="odd">
                    <td>Martena Mccray</td>
                    <td>Post-Sales support</td>
                    
                    <td>46</td>
                    <td>2011/03/09</td>
                    <td>$324,050</td>
                </tr><tr role="row" class="even">
                    <td>Jennifer Acosta</td>
                    <td>Junior Javascript Developer</td>
                    
                    <td>43</td>
                    <td>2013/02/01</td>
                    <td>$75,650</td>
                </tr><tr role="row" class="odd">
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    
                    <td>51</td>
                    <td>2008/11/13</td>
                    <td>$183,000</td>
                </tr><tr class="group"><td colspan="5">London</td></tr><tr role="row" class="even">
                    <td>Jena Gaines</td>
                    <td>Office Manager</td>
                    
                    <td>30</td>
                    <td>2008/12/19</td>
                    <td>$90,560</td>
                </tr><tr role="row" class="odd">
                    <td>Haley Kennedy</td>
                    <td>Senior Marketing Designer</td>
                    
                    <td>43</td>
                    <td>2012/12/18</td>
                    <td>$313,500</td>
                </tr><tr role="row" class="even">
                    <td>Tatyana Fitzpatrick</td>
                    <td>Regional Director</td>
                    
                    <td>19</td>
                    <td>2010/03/17</td>
                    <td>$385,750</td>
                </tr><tr role="row" class="odd">
                    <td>Michael Silva</td>
                    <td>Marketing Designer</td>
                    
                    <td>66</td>
                    <td>2012/11/27</td>
                    <td>$198,500</td>
                </tr><tr role="row" class="even">
                    <td>Bradley Greer</td>
                    <td>Software Engineer</td>
                    
                    <td>41</td>
                    <td>2012/10/13</td>
                    <td>$132,000</td>
                </tr><tr role="row" class="odd">
                    <td>Angelica Ramos</td>
                    <td>Chief Executive Officer (CEO)</td>
                    
                    <td>47</td>
                    <td>2009/10/09</td>
                    <td>$1,200,000</td>
                </tr><tr role="row" class="even">
                    <td>Suki Burks</td>
                    <td>Developer</td>
                    
                    <td>53</td>
                    <td>2009/10/22</td>
                    <td>$114,500</td>
                </tr><tr role="row" class="odd">
                    <td>Prescott Bartlett</td>
                    <td>Technical Author</td>
                    
                    <td>27</td>
                    <td>2011/05/07</td>
                    <td>$145,000</td>
                </tr><tr role="row" class="even">
                    <td>Timothy Mooney</td>
                    <td>Office Manager</td>
                    
                    <td>37</td>
                    <td>2008/12/11</td>
                    <td>$136,200</td>
                </tr><tr role="row" class="odd">
                    <td>Bruno Nash</td>
                    <td>Software Engineer</td>
                    
                    <td>38</td>
                    <td>2011/05/03</td>
                    <td>$163,500</td>
                </tr><tr role="row" class="even">
                    <td>Hermione Butler</td>
                    <td>Regional Director</td>
                    
                    <td>47</td>
                    <td>2011/03/21</td>
                    <td>$356,250</td>
                </tr><tr role="row" class="odd">
                    <td>Lael Greer</td>
                    <td>Systems Administrator</td>
                    
                    <td>21</td>
                    <td>2009/02/27</td>
                    <td>$103,500</td>
                </tr><tr class="group"><td colspan="5">New York</td></tr><tr role="row" class="even">
                    <td>Brielle Williamson</td>
                    <td>Integration Specialist</td>
                    
                    <td>61</td>
                    <td>2012/12/02</td>
                    <td>$372,000</td>
                </tr><tr role="row" class="odd">
                    <td>Paul Byrd</td>
                    <td>Chief Financial Officer (CFO)</td>
                    
                    <td>64</td>
                    <td>2010/06/09</td>
                    <td>$725,000</td>
                </tr><tr role="row" class="even">
                    <td>Gloria Little</td>
                    <td>Systems Administrator</td>
                    
                    <td>59</td>
                    <td>2009/04/10</td>
                    <td>$237,500</td>
                </tr><tr role="row" class="odd">
                    <td>Jenette Caldwell</td>
                    <td>Development Lead</td>
                    
                    <td>30</td>
                    <td>2011/09/03</td>
                    <td>$345,000</td>
                </tr></tbody>
        </table><div class="dataTables_info" id="data-table-row-grouping_info" role="status" aria-live="polite">Showing 1 to 25 of 57 entries</div><div class="dataTables_paginate paging_simple_numbers" id="data-table-row-grouping_paginate"><a class="paginate_button previous disabled" aria-controls="data-table-row-grouping" data-dt-idx="0" tabindex="0" id="data-table-row-grouping_previous">Previous</a><span><a class="paginate_button current" aria-controls="data-table-row-grouping" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="data-table-row-grouping" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="data-table-row-grouping" data-dt-idx="3" tabindex="0">3</a></span><a class="paginate_button next" aria-controls="data-table-row-grouping" data-dt-idx="4" tabindex="0" id="data-table-row-grouping_next">Next</a></div></div>
    </div>
    </div>
</div>
      
@endsection

@section('js')

@endsection