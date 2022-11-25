<p>Chào {{$full_name}},</p>

<p>
    Chúng tôi đã xem hồ sơ của bạn trên website IT-Job. Tôi là nhà
    tuyển dụng tại {{$company_name}} và chúng tôi đang tìm kiếm một {{$job_title}} mà tôi nghĩ bạn sẽ phù hợp.
</p>

<p>Nếu bạn quan tâm về công việc này, có thể truy cập vào trang web của IT-Job để biết thêm thông tin chi tiết về công
    việc:
    <a href="{{env('WEBSITE_URL')}}/job/{{$job_id}}">Công việc {{$job_title}} của {{$company_name}}</a>
</p>


<p>Trân trọng,</p>

<p>HR của {{$company_name}}</p>
