<?php
// No direct access
defined('JPATH_BASE') or die;

/**
 * JDocument footer renderer
 */
class JDocumentRendererFooter extends JDocumentRenderer
{
   public function render($footer, $params = array(), $content = null)
   {
      ob_start();
      echo $this->fetchFooter($this->_doc);
      $buffer = ob_get_contents();
      ob_end_clean();

      return $buffer;
   }

   public function fetchFooter(&$document)
   {
      $app = JFactory::getApplication();
      $app->triggerEvent('onBeforeCompileFooter');
      $lnEnd   = $document->_getLineEnd();
      $tab   = $document->_getTab();
      $buffer   = '';

      foreach ($document->_footer_scripts as $strSrc => $strType) {
         $buffer .= $tab.'<script type="'.$strType['mime'].'" src="'.$strSrc.'"></script>'.$lnEnd;
      }
      
      return $buffer;
   }
}
?>
