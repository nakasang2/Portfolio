const slug = "icon-list-block";

export const dashboardInfo = (info) => {
  const { version, isPremium, hasPro, licenseActiveNonce } = info;

  const proSuffix = isPremium ? ' Pro' : '';

  return {
    name: `Icon List Block${proSuffix}`,
    displayName: `Icon List Block${proSuffix} - Add Icon-Based Lists with Custom Styles`,
    description:
      "Icon List Block lets you create clean, stylish, and highly customizable icon-based lists with ease. Choose from multiple themes, custom icons, badges, and layout options to highlight features, services, or key information. Each list item supports individual links, animations, and advanced styling controls for full design flexibility. It works seamlessly with the Full Site Editor and requires no external block libraries. Perfect for creating visually engaging and interactive content on any WordPress website.",
    slug,
    version,
    isPremium,
    hasPro,
    displayOurPlugins: true,
    media: {
      logo: `https://ps.w.org/${slug}/assets/icon-128x128.png`,
      banner: `https://ps.w.org/${slug}/assets/banner-772x250.png`,
      thumbnail: `https://bplugins.com/wp-content/themes/b-technologies/assets/images/products/${slug}.png`,
      // proThumbnail: `https://bplugins.com/wp-content/themes/b-technologies/assets/images/products/${slug}-pro.png`,
      // video: 'https://youtu.be/n3B4SpbDS30',
      // isYoutube: true
    },
    pages: {
      org: `https://wordpress.org/plugins/${slug}/`,
      landing: `https://bplugins.com/products/${slug}/`,
      docs: `https://bplugins.com/docs/${slug}/`,
      pricing: `https://bplugins.com/products/${slug}/pricing`,
    },
    freemius: {
      product_id: 17174,
      plan_id: 28639,
      public_key: 'pk_51f816736288458da2dd37c719fd3'
    },

    licenseActiveNonce,

    changelogs: [
      {
        version: '1.2.5 – 26 Feb 26',
        type: 'Update',
        list: [
          'Dashboard menu item rename',
          'Update Demo & Help page'
        ]
      },
      {
        version: '1.2.4 – 17 Feb 26',
        type: 'Update',
        list: [
          'Pro modal upgrade the premium quality designed and Quick themes Change options.'
        ]
      },
      {
        version: '1.2.3 – 13 Nov 25',
        type: 'update',
        list: [
          'Freemius sdk version updated',
          'Demo Created and applied'
        ]
      },
      {
        version: '1.2.2 – 9 Nov 25',
        type: 'Fixed',
        list: [
          'shortcode copy issue fixed',
        ]
      }
    ],
    proFeatures: [
      'Select the theme of your choice to personalize your experience and give your website the look and feel that suits your style',
      'Customize the background of your list items to enhance their appearance and match your design preferences',
      'Toggle the visibility of URL icons for list items, allowing you to show or hide them based on your design needs',
      ' Enable or disable badges for list items to highlight specific content or keep the design clean and simple',
      ' Set a variant styles for the animated pulse effect to draw attention and enhance visual engagement',
      'Upload and use custom images to personalize your list items and make your content stand out',
      'Customize grid layouts for themes to organize and display your list items with precision and style',
      'Exclusive smooth effects available only in Pro'
    ],
    startButton: {
      label: 'Start Now',
      url: 'wp-admin/post-new.php?post_type=icon-list-block'
    }
  }
}

export const demoInfo = {
  allInOneLabel: 'See All Demos',
  allInOneLink: 'https://bblockswp.com/demo/icon-list-block/',
  demos: [
    {
      "title": "Default",
      "description": "Clean player with basic controls.",
      "url": "https://bblockswp.com/demo/icon-list-block-default/",
      "icon": (<svg stroke='#000' fill='#000' strokeWidth='0' viewBox='0 0 24 24' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg'><path d='M5 9V7H7V9H5Z' fill='currentColor'></path><path d='M9 9H19V7H9V9Z' fill='currentColor'></path><path d='M5 15V17H7V15H5Z' fill='currentColor'></path><path d='M19 17H9V15H19V17Z' fill='currentColor'></path><path fillRule='evenodd' clipRule='evenodd' d='M1 6C1 4.34315 2.34315 3 4 3H20C21.6569 3 23 4.34315 23 6V18C23 19.6569 21.6569 21 20 21H4C2.34315 21 1 19.6569 1 18V6ZM4 5H20C20.5523 5 21 5.44772 21 6V11H3V6C3 5.44772 3.44772 5 4 5ZM3 13V18C3 18.5523 3.44772 19 4 19H20C20.5523 19 21 18.5523 21 18V13H3Z' fill='currentColor'></path></svg>),
      "type": 'iframe'
    },
    {
      "title": "Linked Badge",
      "description": "Starts muted and plays automatically.",
      "url": "https://bblockswp.com/demo/icon-list-block-linked-badge/",
      "icon": (<svg stroke='#000' fill='#000' strokeWidth='0' viewBox='0 0 24 24' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg'><path d='M5 9V7H7V9H5Z' fill='currentColor'></path><path d='M9 9H19V7H9V9Z' fill='currentColor'></path><path d='M5 15V17H7V15H5Z' fill='currentColor'></path><path d='M19 17H9V15H19V17Z' fill='currentColor'></path><path fillRule='evenodd' clipRule='evenodd' d='M1 6C1 4.34315 2.34315 3 4 3H20C21.6569 3 23 4.34315 23 6V18C23 19.6569 21.6569 21 20 21H4C2.34315 21 1 19.6569 1 18V6ZM4 5H20C20.5523 5 21 5.44772 21 6V11H3V6C3 5.44772 3.44772 5 4 5ZM3 13V18C3 18.5523 3.44772 19 4 19H20C20.5523 19 21 18.5523 21 18V13H3Z' fill='currentColor'></path></svg>),
      "type": 'iframe'
    },
    {
      "title": "Smart Grid",
      "description": "Resize player to fit your layout.",
      "url": "https://bblockswp.com/demo/icon-list-block-smart-grid/",
      "icon": (<svg stroke='#000' fill='#000' strokeWidth='0' viewBox='0 0 24 24' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg'><path d='M5 9V7H7V9H5Z' fill='currentColor'></path><path d='M9 9H19V7H9V9Z' fill='currentColor'></path><path d='M5 15V17H7V15H5Z' fill='currentColor'></path><path d='M19 17H9V15H19V17Z' fill='currentColor'></path><path fillRule='evenodd' clipRule='evenodd' d='M1 6C1 4.34315 2.34315 3 4 3H20C21.6569 3 23 4.34315 23 6V18C23 19.6569 21.6569 21 20 21H4C2.34315 21 1 19.6569 1 18V6ZM4 5H20C20.5523 5 21 5.44772 21 6V11H3V6C3 5.44772 3.44772 5 4 5ZM3 13V18C3 18.5523 3.44772 19 4 19H20C20.5523 19 21 18.5523 21 18V13H3Z' fill='currentColor'></path></svg>),
      "type": 'iframe'
    },
    {
      "title": "Icon Badge",
      "description": "Shows every available control option.",
      "url": "https://bblockswp.com/demo/icon-list-block-icon-badge/",
      "icon": (<svg stroke='#000' fill='#000' strokeWidth='0' viewBox='0 0 24 24' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg'><path d='M5 9V7H7V9H5Z' fill='currentColor'></path><path d='M9 9H19V7H9V9Z' fill='currentColor'></path><path d='M5 15V17H7V15H5Z' fill='currentColor'></path><path d='M19 17H9V15H19V17Z' fill='currentColor'></path><path fillRule='evenodd' clipRule='evenodd' d='M1 6C1 4.34315 2.34315 3 4 3H20C21.6569 3 23 4.34315 23 6V18C23 19.6569 21.6569 21 20 21H4C2.34315 21 1 19.6569 1 18V6ZM4 5H20C20.5523 5 21 5.44772 21 6V11H3V6C3 5.44772 3.44772 5 4 5ZM3 13V18C3 18.5523 3.44772 19 4 19H20C20.5523 19 21 18.5523 21 18V13H3Z' fill='currentColor'></path></svg>),
      "type": 'iframe'
    },
    {
      "title": "Pulse Grid Glow",
      "description": "Skip 2s and set preload behavior.",
      "url": "https://bblockswp.com/demo/icon-list-block-pulse-grid-glow/",
      "icon": (<svg stroke='#000' fill='#000' strokeWidth='0' viewBox='0 0 24 24' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg'><path d='M5 9V7H7V9H5Z' fill='currentColor'></path><path d='M9 9H19V7H9V9Z' fill='currentColor'></path><path d='M5 15V17H7V15H5Z' fill='currentColor'></path><path d='M19 17H9V15H19V17Z' fill='currentColor'></path><path fillRule='evenodd' clipRule='evenodd' d='M1 6C1 4.34315 2.34315 3 4 3H20C21.6569 3 23 4.34315 23 6V18C23 19.6569 21.6569 21 20 21H4C2.34315 21 1 19.6569 1 18V6ZM4 5H20C20.5523 5 21 5.44772 21 6V11H3V6C3 5.44772 3.44772 5 4 5ZM3 13V18C3 18.5523 3.44772 19 4 19H20C20.5523 19 21 18.5523 21 18V13H3Z' fill='currentColor'></path></svg>),
      "type": 'iframe'
    },
    {
      "title": "Click Badge",
      "description": "Loop tracks endlessly when enabled.",
      "url": "https://bblockswp.com/demo/icon-list-block-click-badge/",
      "icon": (<svg stroke='#000' fill='#000' strokeWidth='0' viewBox='0 0 24 24' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg'><path d='M5 9V7H7V9H5Z' fill='currentColor'></path><path d='M9 9H19V7H9V9Z' fill='currentColor'></path><path d='M5 15V17H7V15H5Z' fill='currentColor'></path><path d='M19 17H9V15H19V17Z' fill='currentColor'></path><path fillRule='evenodd' clipRule='evenodd' d='M1 6C1 4.34315 2.34315 3 4 3H20C21.6569 3 23 4.34315 23 6V18C23 19.6569 21.6569 21 20 21H4C2.34315 21 1 19.6569 1 18V6ZM4 5H20C20.5523 5 21 5.44772 21 6V11H3V6C3 5.44772 3.44772 5 4 5ZM3 13V18C3 18.5523 3.44772 19 4 19H20C20.5523 19 21 18.5523 21 18V13H3Z' fill='currentColor'></path></svg>),
      "type": 'iframe'
    },
    {
      "title": "Orbit Grid",
      "description": "Sleek modern Fusion skin design.",
      "url": "https://bblockswp.com/demo/icon-list-block-orbit-grid/",
      "icon": (<svg stroke='#000' fill='#000' strokeWidth='0' viewBox='0 0 24 24' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg'><path d='M5 9V7H7V9H5Z' fill='currentColor'></path><path d='M9 9H19V7H9V9Z' fill='currentColor'></path><path d='M5 15V17H7V15H5Z' fill='currentColor'></path><path d='M19 17H9V15H19V17Z' fill='currentColor'></path><path fillRule='evenodd' clipRule='evenodd' d='M1 6C1 4.34315 2.34315 3 4 3H20C21.6569 3 23 4.34315 23 6V18C23 19.6569 21.6569 21 20 21H4C2.34315 21 1 19.6569 1 18V6ZM4 5H20C20.5523 5 21 5.44772 21 6V11H3V6C3 5.44772 3.44772 5 4 5ZM3 13V18C3 18.5523 3.44772 19 4 19H20C20.5523 19 21 18.5523 21 18V13H3Z' fill='currentColor'></path></svg>),
      "type": 'iframe'
    }
  ]
}

export const pricingInfo = {
  logo: `https://ps.w.org/${slug}/assets/icon-128x128.png`, // Optional
  pluginId: 17174,
  planId: 28639,
  licenses: [
    1,
    3,
    null
  ],
  button: {
    label: 'Buy Now ➜'
  },
  featured: {
    selected: 3, // choose from licenses item
  }
}