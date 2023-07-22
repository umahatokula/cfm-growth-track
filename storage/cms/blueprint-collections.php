<?php return array (
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