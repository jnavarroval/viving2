@php
    $info_url = 'info@'.$email_url;
    $support_url = 'support@'.$email_url;

@endphp
<x-mail::message>

Infinite Blessings,  **{{ $user->name }}**,

I hope this message finds you well! I want to welcome you personally to **My Source Network,**  _The Global Healing Community Platform_! As someone passionate about Holistic Healing, you will make an excellent addition to Our Community, and I am honored to have you on board!

**My Source Network** was created with YOU in mind, and we are thrilled to welcome you!

Our Platform connects Healers from all over the world, creating a Supportive Network of Individuals who are passionate about promoting Health and Well-Being. By sharing your unique skills and experiences, you can help others on their healing journeys while expanding your knowledge and understanding. 

We understand how challenging it is for Healers to independently handle their websites, social media, SEO, and internet advertising. 

Therefore, **My Source Network** makes it simpler for you to express yourself and reach more people. We have made our best effort to build **The Global Healing Community Platform** so that anyone can search for Healers, Conscious Events, and Healing/Restorative Businesses in their neighborhood or anywhere around the globe.

We encourage you to take full advantage of the fantastic resources that Our Platform has to offer. Browse our forums to connect with other Healers, Holistic Businesses, and Individuals seeking healing, join Online Events and Workshops to deepen your knowledge, and create your Profile where you can list your offerings in service to those in need. 

As someone dedicated to educating and inspiring others, you can share your content, such as videos, articles, podcasts, blogs, and courses, with a large audience interested in learning more about you and your specialization.

We are here to simplify marketing for all Healers so that they can change the world by sharing their unique Talents and Services. To learn more about Our Platform, please visit our website
 <a href="{{$url}}" > <i> {{$url}}</i> </a>.

If you need assistance, please contact us at <a href="{{$info_url}}" > <i> {{$info_url}}</i> </a>.

For technical questions, passwords, login, and platform, please utilize the FAQ section on the Platform. If you cannot find the answers, please contact us at <a href="{{$support_url}}" > <i> {{$support_url}}</i> </a>.

We are here to support Healers like you every step of the way as we are on a mission to Heal The World! 

Thank you for joining <b>My Source Network!</b> We look forward to seeing the difference you will make and all you will achieve in being a part of Our Community. 

Infinite Blessings, Gratitude & Love,

<i> <a href="#" style="text-decoration:none"> Sonnie Dean Menzies, </a> </br>
    Founder and CEO </br>
    My Source Network </i>
</x-mail::message>
