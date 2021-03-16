            
    @foreach ($gallery as $row)
    <div class="col-md-4">
        <div class="course-box">
            <div class="image-wrap entry">
                <img src="{{asset('upload/post/'.$row->thumbnail)}}" alt="{{$row->title}}" class="img-responsive">
                <div class="magnifier">
                    <a href="{{route('detail-post',['slug'=>str_replace(' ', '-', $row->title)])}}" title=""><i class="flaticon-add"></i></a>
                </div>
            </div><!-- end image-wrap -->
        </div><!-- end box -->
    </div><!-- end col -->
    @endforeach