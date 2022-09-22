import '../dist/css/laraberg.css'

/**
 * WordPress dependencies
 */
 import { addFilter } from '@wordpress/hooks';
 import { default as MediaUpload } from './block-editor/lib/upload-media';
  
 addFilter(
     'editor.MediaUpload',
     'core/edit-widgets/replace-media-upload',
     () => MediaUpload
 );

import { wordpress, Editor, registerBlockType, removeEditor, unregisterBlockType } from './block-editor'
import { init } from './init'

window['Laraberg'] = {
 wordpress, Editor, registerBlockType, removeEditor, unregisterBlockType, init
}
