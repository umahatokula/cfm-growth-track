<?php return array (
  '6947ff28-b660-47d7-9240-24ca6d58aeae' => 
  array (
    'uuid' => '6947ff28-b660-47d7-9240-24ca6d58aeae',
    'handle' => 'Blog\\Author',
    'type' => 'entry',
    'name' => 'Author',
    'drafts' => false,
    'navigation' => 
    array (
      'parent' => 'Blog\\Post',
      'icon' => 'octo-icon-user',
      'order' => 200,
    ),
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
    'handleSlug' => 'blog_author',
  ),
  'b022a74b-15e6-4c6b-9eb9-17efc5103543' => 
  array (
    'uuid' => 'b022a74b-15e6-4c6b-9eb9-17efc5103543',
    'type' => 'structure',
    'handle' => 'Blog\\Category',
    'name' => 'Category',
    'drafts' => false,
    'structure' => 
    array (
      'maxDepth' => 1,
    ),
    'navigation' => 
    array (
      'parent' => 'Blog\\Post',
      'icon' => 'octo-icon-list-ul',
      'order' => 150,
    ),
    'fields' => 
    array (
      'description' => 
      array (
        'label' => 'Description',
      ),
    ),
    'handleSlug' => 'blog_category',
  ),
  'edcd102e-0525-4e4d-b07e-633ae6c18db6' => 
  array (
    'uuid' => 'edcd102e-0525-4e4d-b07e-633ae6c18db6',
    'handle' => 'Blog\\Post',
    'type' => 'stream',
    'name' => 'Post',
    'drafts' => true,
    'primaryNavigation' => 
    array (
      'label' => 'Blog',
      'icon' => 'octo-icon-file',
      'iconSvg' => 'modules/tailor/assets/images/blog-icon.svg',
      'order' => 95,
    ),
    'navigation' => 
    array (
      'icon' => 'octo-icon-pencil',
      'order' => 100,
    ),
    'groups' => 
    array (
      'regular_post' => 
      array (
        'name' => 'Regular Post',
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
      'markdown_post' => 
      array (
        'name' => 'Markdown Post',
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
    ),
    'handleSlug' => 'blog_post',
  ),
  '960ca857-039e-46f5-9d04-d0cc237afe44' => 
  array (
    'uuid' => '960ca857-039e-46f5-9d04-d0cc237afe44',
    'handle' => 'FAQS',
    'type' => 'entry',
    'name' => 'FAQs',
    'drafts' => false,
    'primaryNavigation' => 
    array (
      'label' => 'FAQs',
      'icon' => 'icon-magic',
      'order' => 110,
    ),
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
    'handleSlug' => 'f_a_q_s',
  ),
  '9d1f80aa-b5f8-4402-b9ff-0f7de256a941' => 
  array (
    'uuid' => '9d1f80aa-b5f8-4402-b9ff-0f7de256a941',
    'handle' => 'MainMenu',
    'type' => 'single',
    'name' => 'MainMenu',
    'drafts' => true,
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
    'handleSlug' => 'main_menu',
  ),
  '89724a55-eacf-48a5-97c9-a041cea8c8b1' => 
  array (
    'uuid' => '89724a55-eacf-48a5-97c9-a041cea8c8b1',
    'handle' => 'Education',
    'type' => 'entry',
    'name' => 'Education',
    'drafts' => false,
    'navigation' => 
    array (
      'icon' => 'icon-magic',
      'order' => 10,
    ),
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
    'handleSlug' => 'education',
  ),
  '295a8b2a-a446-443b-bf40-184151906d15' => 
  array (
    'uuid' => '295a8b2a-a446-443b-bf40-184151906d15',
    'handle' => 'Experience',
    'type' => 'entry',
    'name' => 'Experience',
    'drafts' => true,
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
    'handleSlug' => 'experience',
  ),
  'a63fabaf-7c0b-4c74-b36f-7abf1a3ad1c1' => 
  array (
    'uuid' => 'a63fabaf-7c0b-4c74-b36f-7abf1a3ad1c1',
    'handle' => 'LandingPage',
    'type' => 'single',
    'name' => 'Landing Page',
    'drafts' => true,
    'navigation' => 
    array (
      'icon' => 'icon-rocket',
    ),
    'fields' => 
    array (
      'block_builder' => 
      array (
        'type' => 'mixin',
        'source' => 'BlockBuilder',
      ),
    ),
    'handleSlug' => 'landing_page',
  ),
  '2365912e-f439-4301-8f0b-fb7491d58a06' => 
  array (
    'uuid' => '2365912e-f439-4301-8f0b-fb7491d58a06',
    'handle' => 'Portfolio',
    'type' => 'entry',
    'name' => 'Portfolio',
    'drafts' => true,
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
    'handleSlug' => 'portfolio',
  ),
  'c542760a-37d0-43fb-ad55-b21ed0ae6f51' => 
  array (
    'uuid' => 'c542760a-37d0-43fb-ad55-b21ed0ae6f51',
    'handle' => 'Skills',
    'type' => 'single',
    'name' => 'Skills',
    'drafts' => true,
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
    'handleSlug' => 'skills',
  ),
);