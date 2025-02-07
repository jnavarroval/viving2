@php
    $info_url = 'info@'.$email_url;
    $support_url = 'support@'.$email_url;

@endphp
<x-mail::message>

Infinite Blessings, **{{ $user->name }}**,

Get ready to embark on an incredible healing journey with **My Source Network,** __The Global Healing Community Platform__! We are excited to have you join Our Community of Individuals on their healing journey, along with those who have opened their hearts, bringing their gifts forward, dedicated to supporting and empowering others by promoting Health and Well-Being around the globe.

We created this Platform with YOU in mind. We understand how important it is for you to feel and know that you are supported and comfortable while exploring your healing path, and we are here to assist in facilitating that process.

As a Seeker, you can access a network of Healers, Businesses, and resources to support your healing journey. Our Platform is designed to provide the support, guidance, inspiration, and practical tools needed to bring deeper awareness as we support you on your healing journey, reconnecting you with your innate healing ability to improve your Health and Well-Being.

We encourage you to explore all that Our Platform has to offer, search and connect with Holistic Businesses and Healers providing a variety of Modalities. You will be able to explore and find a variety of workshops in your area and virtually. Find, book, and attend Conscious Events around the globe, all of which will help you deepen your knowledge and understanding, release old programs and beliefs, and heal traumas while being supported along your healing journey.

We want to ensure that everyone has access to resources needed as they progress through their healing journey and know they are Loved and Supported. That's why we are offering FREE access to anyone needing them. We are in the process of compiling and will continue to do so "Free Resources" that will be available through the __"Healing Together"__ section on our site  <a href="{{$url}}/healingtogether"><i> {{$url}}/healingtogether </i></a>, where **My Source Network** and Our Community of Healers, Businesses, and Members alike will keep adding and updating this section regularly.

**My Source Network** offers FREE access to Everyone through its Membership-Based Portal as we honor your journey and know that it's not easy. We want you to know that you are not alone and are here to support you. Please take the time necessary to complete your profile fully, so that you can enjoy all the benefits of Our Platform with your Free Membership.

We want you to know that we are here to support you every step of the way. If you have any questions or need assistance, please do not hesitate to contact us.

To learn more about Our Platform, please visit our website
<a href="{{$url}}"><i> {{$url}} </i></a>.

If you need assistance or have questions not covered in the FAQ section, please feel free to contact us at <a href="#"> <i> {{$info_url}} </i></a>
    
For technical questions, use the FAQ section of the platform. If you cannot find the answer, contact us at 
<a href="#"> <i> {{$support_url}} </i></a>.

Thank you for joining <b> My Source Network, </b> and we look forward to seeing all you will achieve as part of Our Community! 

Infinite Blessings, Gratitude & Love,

<i> <a href="#" style="text-decoration:none"> Sonnie Dean Menzies, </a> </br>
    Founder and CEO </br>
    My Source Network </i>
</x-mail::message>
