<?php return array (
  '3328c303-7989-462e-b866-27e7037ba275' => 
  array (
    'uuid' => '3328c303-7989-462e-b866-27e7037ba275',
    'handle' => 'Blog\\Config',
    'type' => 'global',
    'name' => 'Blog Settings',
    'navigation' => 
    array (
      'parent' => 'Blog\\Post',
      'icon' => 'octo-icon-cog',
      'order' => 200,
    ),
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
    'handleSlug' => 'blog_config',
  ),
  'ae2d2c25-3a0e-4765-8b36-d1666fc0e31f' => 
  array (
    'uuid' => 'ae2d2c25-3a0e-4765-8b36-d1666fc0e31f',
    'name' => 'Social Links',
    'type' => 'global',
    'handle' => 'Fields\\SocialLinks',
    'primaryNavigation' => 
    array (
      'label' => 'Globals',
      'icon' => 'icon-magic',
      'order' => 150,
    ),
    'navigation' => 
    array (
      'parent' => 'Globals',
      'icon' => 'icon-magic',
      'order' => 10,
    ),
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
    'handleSlug' => 'fields_social_links',
  ),
);