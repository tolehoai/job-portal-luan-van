<p>Chào {{$full_name}},</p>

<p>Cảm ơn bạn đã ứng tuyển vào vị trí <b>{{$job_title}}</b> tại <b>{{$company_name}}</b>.</p>

<p>Chúng tôi muốn mời bạn đến với tôi để phỏng vấn cho vị trí <b>{{$job_title}}</b>.
    @if(!empty($interview_address))
        Cuộc phỏng vấn của bạn đã được lên lịch
        vào {{$interview_date_time}}, tại nền tảng video trực tuyến <a href="{{$interview_address}}">Link</a>.
    @else
        Cuộc phỏng vấn của bạn đã được lên lịch
        vào <b>{{$interview_date_time}}, tại {{$office_address}}</b>.
    @endif
    </p>

<p>Trân trọng,</p>

<p>HR của {{$company_name}}</p>
