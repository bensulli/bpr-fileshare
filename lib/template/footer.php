
<div id="copyright">
    <p>
        <!-- Project links -->
        <?php
          echo t('Made with') .
            ' <a href="https://gitlab.com/mojo42/Jirafeau">' . t('Jirafeau Project') . '</a>' .
            ' (<a href="https://www.gnu.org/licenses/agpl.html"><abbr title="Affero General Public License">AGPL</abbr>v3</a>) | ' . 'Modified by <a href="https://blueprintreality.com">Blueprint Reality Inc.</a> for <a href="https://awaken-game.com">Awaken</a> (<a href="https://github.com/bensulli/bpr-fileshare">GitHub</a>)';
        ?>
        <!-- Installation dependend links -->
        <?php
        if (false === empty($cfg['web_root']))
        {
          echo ' | ';
          echo '<a href="https://blueprintreality.com/tos">Terms of Service</a>';
        }
        ?>
    </p>
</div>
</div>
</body>
</html>
