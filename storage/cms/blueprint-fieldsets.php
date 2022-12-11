<?php return array (
  '6947ff28-b660-47d7-9240-24ca6d58aeae' => 
  array (
    'name' => 'Author',
    'handle' => 'Blog\\Author',
    'contentUuid' => '6947ff28-b660-47d7-9240-24ca6d58aeae',
    'fields' => 
    array (
      'avatar' => 
      array (
        'label' => 'Avatar',
        'type' => 'mediafinder',
        'mode' => 'image',
      ),
      'role' => 
      array (
        'label' => 'Role',
        'type' => 'text',
      ),
      'about' => 
      array (
        'label' => 'About',
        'type' => 'textarea',
      ),
      '_social_links' => 
      array (
        'type' => 'mixin',
        'label' => 'Social Links',
        'source' => 'Fields\\SocialLinks',
        'tab' => 'Social',
      ),
    ),
  ),
  'b022a74b-15e6-4c6b-9eb9-17efc5103543' => 
  array (
    'name' => 'Category',
    'handle' => 'Blog\\Category',
    'contentUuid' => 'b022a74b-15e6-4c6b-9eb9-17efc5103543',
    'fields' => 
    array (
      'description' => 
      array (
        'label' => 'Description',
      ),
    ),
  ),
  'edcd102e-0525-4e4d-b07e-633ae6c18db6:regular_post' => 
  array (
    'name' => 'Regular Post',
    'handle' => 'regular_post',
    'contentUuid' => 'edcd102e-0525-4e4d-b07e-633ae6c18db6',
    'fields' => 
    array (
      'content' => 
      array (
        'tab' => 'Edit',
        'label' => 'Content',
        'type' => 'richeditor',
        'span' => 'adaptive',
      ),
      'blog_post_content' => 
      array (
        'type' => 'mixin',
        'source' => 'Blog\\PostContent',
      ),
    ),
  ),
  'edcd102e-0525-4e4d-b07e-633ae6c18db6:markdown_post' => 
  array (
    'name' => 'Markdown Post',
    'handle' => 'markdown_post',
    'contentUuid' => 'edcd102e-0525-4e4d-b07e-633ae6c18db6',
    'fields' => 
    array (
      'content' => 
      array (
        'tab' => 'Edit',
        'label' => 'Content',
        'type' => 'markdown',
        'span' => 'adaptive',
      ),
      'blog_post_content' => 
      array (
        'type' => 'mixin',
        'source' => 'Blog\\PostContent',
      ),
    ),
  ),
  '960ca857-039e-46f5-9d04-d0cc237afe44' => 
  array (
    'name' => 'FAQs',
    'handle' => 'FAQS',
    'contentUuid' => '960ca857-039e-46f5-9d04-d0cc237afe44',
    'fields' => 
    array (
      'question' => 
      array (
        'label' => 'Question',
        'type' => 'text',
        'span' => 'full',
      ),
      'answer' => 
      array (
        'label' => 'Answer',
        'type' => 'textarea',
        'size' => 'small',
        'span' => 'full',
      ),
    ),
  ),
  '9d1f80aa-b5f8-4402-b9ff-0f7de256a941' => 
  array (
    'name' => 'MainMenu',
    'handle' => 'MainMenu',
    'contentUuid' => '9d1f80aa-b5f8-4402-b9ff-0f7de256a941',
    'fields' => 
    array (
      'menu_items' => 
      array (
        'label' => 'Menu Items',
        'type' => 'repeater',
        'span' => 'full',
        'form' => 
        array (
          'fields' => 
          array (
            'item' => 
            array (
              'label' => 'Menu Name',
              'type' => 'text',
              'span' => 'auto',
            ),
            'value' => 
            array (
              'label' => 'URL',
              'type' => 'text',
              'span' => 'auto',
            ),
          ),
        ),
      ),
    ),
  ),
  '89724a55-eacf-48a5-97c9-a041cea8c8b1' => 
  array (
    'name' => 'Education',
    'handle' => 'Education',
    'contentUuid' => '89724a55-eacf-48a5-97c9-a041cea8c8b1',
    'fields' => 
    array (
      'year_from' => 
      array (
        'label' => 'Year From',
        'type' => 'datepicker',
        'mode' => 'date',
        'span' => 'auto',
      ),
      'year_to' => 
      array (
        'label' => 'Year To',
        'type' => 'datepicker',
        'mode' => 'date',
        'span' => 'auto',
      ),
      'degree' => 
      array (
        'label' => 'Degree',
        'type' => 'text',
        'span' => 'auto',
      ),
      'institution' => 
      array (
        'label' => 'Institution',
        'type' => 'text',
        'span' => 'auto',
      ),
      'description' => 
      array (
        'label' => 'Description',
        'type' => 'textarea',
        'span' => 'auto',
      ),
    ),
  ),
  '295a8b2a-a446-443b-bf40-184151906d15' => 
  array (
    'name' => 'Experience',
    'handle' => 'Experience',
    'contentUuid' => '295a8b2a-a446-443b-bf40-184151906d15',
    'fields' => 
    array (
      'year_from' => 
      array (
        'label' => 'Year From',
        'type' => 'datepicker',
        'mode' => 'date',
        'span' => 'auto',
      ),
      'year_to' => 
      array (
        'label' => 'Year To',
        'type' => 'datepicker',
        'mode' => 'date',
        'span' => 'auto',
      ),
      'job_title' => 
      array (
        'label' => 'Job Title',
        'type' => 'text',
        'span' => 'auto',
      ),
      'company' => 
      array (
        'label' => 'Company',
        'type' => 'text',
        'span' => 'auto',
      ),
      'description' => 
      array (
        'label' => 'Description',
        'type' => 'textarea',
        'span' => 'auto',
      ),
    ),
  ),
  'a63fabaf-7c0b-4c74-b36f-7abf1a3ad1c1' => 
  array (
    'name' => 'Landing Page',
    'handle' => 'LandingPage',
    'contentUuid' => 'a63fabaf-7c0b-4c74-b36f-7abf1a3ad1c1',
    'fields' => 
    array (
      'block_builder' => 
      array (
        'type' => 'mixin',
        'source' => 'BlockBuilder',
      ),
    ),
  ),
  '2365912e-f439-4301-8f0b-fb7491d58a06' => 
  array (
    'name' => 'Portfolio',
    'handle' => 'Portfolio',
    'contentUuid' => '2365912e-f439-4301-8f0b-fb7491d58a06',
    'fields' => 
    array (
      'image' => 
      array (
        'label' => 'Image',
        'type' => 'mediafinder',
        'mode' => 'image',
        'maxItems' => 1,
      ),
      'job_title' => 
      array (
        'label' => 'Job Title',
        'type' => 'text',
        'span' => 'auto',
      ),
      'project_website' => 
      array (
        'label' => 'Project Website',
        'type' => 'text',
        'span' => 'auto',
      ),
      'client' => 
      array (
        'label' => 'Client',
        'type' => 'text',
        'span' => 'auto',
      ),
      'duration' => 
      array (
        'label' => 'Duration',
        'type' => 'text',
        'span' => 'auto',
      ),
      'technologies' => 
      array (
        'label' => 'Technologies',
        'type' => 'repeater',
        'span' => 'auto',
        'form' => 
        array (
          'fields' => 
          array (
            'name' => 
            array (
              'label' => 'Name',
              'type' => 'text',
              'span' => 'auto',
            ),
          ),
        ),
      ),
      'budget' => 
      array (
        'label' => 'Budget',
        'type' => 'text',
        'span' => 'auto',
      ),
    ),
  ),
  'c542760a-37d0-43fb-ad55-b21ed0ae6f51' => 
  array (
    'name' => 'Skills',
    'handle' => 'Skills',
    'contentUuid' => 'c542760a-37d0-43fb-ad55-b21ed0ae6f51',
    'fields' => 
    array (
      'skills' => 
      array (
        'label' => 'Skills',
        'type' => 'repeater',
        'span' => 'auto',
        'form' => 
        array (
          'fields' => 
          array (
            'name' => 
            array (
              'label' => 'Name',
              'type' => 'text',
              'span' => 'auto',
            ),
            'proficiency' => 
            array (
              'label' => 'Proficiency',
              'type' => 'number',
              'span' => 'auto',
            ),
          ),
        ),
      ),
    ),
  ),
  '3328c303-7989-462e-b866-27e7037ba275' => 
  array (
    'name' => 'Blog Settings',
    'handle' => 'Blog\\Config',
    'contentUuid' => '3328c303-7989-462e-b866-27e7037ba275',
    'fields' => 
    array (
      'blog_name' => 
      array (
        'label' => 'Blog Name',
        'tab' => 'General',
        'placeholder' => 'Latest News',
      ),
      'about_this_blog' => 
      array (
        'label' => 'About This Blog',
        'comment' => 'Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.',
        'type' => 'textarea',
        'size' => 'small',
        'tab' => 'General',
      ),
      '_section1' => 
      array (
        'label' => 'Social Links',
        'type' => 'section',
        'tab' => 'General',
      ),
      '_social_links' => 
      array (
        'type' => 'mixin',
        'source' => 'Fields\\SocialLinks',
        'tab' => 'General',
      ),
    ),
  ),
  'ae2d2c25-3a0e-4765-8b36-d1666fc0e31f' => 
  array (
    'name' => 'Social Links',
    'handle' => 'Fields\\SocialLinks',
    'contentUuid' => 'ae2d2c25-3a0e-4765-8b36-d1666fc0e31f',
    'fields' => 
    array (
      'phone' => 
      array (
        'type' => 'text',
        'label' => 'Phone number',
      ),
      'email' => 
      array (
        'type' => 'text',
        'label' => 'Email',
      ),
      'social_links' => 
      array (
        'type' => 'repeater',
        'prompt' => 'Add Link',
        'form' => 
        array (
          'fields' => 
          array (
            'platform' => 
            array (
              'span' => 'auto',
              'label' => 'Platform',
              'type' => 'dropdown',
              'options' => 
              array (
                'facebook' => 'Facebook',
                'linkedin' => 'LinkedIn',
                'github' => 'Github',
                'dribbble' => 'Dribbble',
                'twitter' => 'Twitter',
                'youtube' => 'YouTube',
                'instagram' => 'Instagram',
              ),
            ),
            'url' => 
            array (
              'span' => 'auto',
              'label' => 'Social Link',
              'type' => 'text',
              'placeholder' => 'https://...',
            ),
          ),
        ),
      ),
    ),
  ),
);