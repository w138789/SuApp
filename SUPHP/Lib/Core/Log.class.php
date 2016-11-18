<?php

/*
 * 错误日志处理
 */

class Log
{
    public static function write($msg = null, $level = 'ERROR', $type = 3, $best = null)
    {
        if (!C('SAVE_LOG')) return;
        if (is_null($best))
        {
            $best = LOG_PATH . '/' . date('Y_m_d') . '.log';
        }
        if (is_dir(LOG_PATH)) error_log('[TIME:]' . date('Y-m-d H:i:s') . ' ' . $level . ":" . $msg . "\t\n", $type, $best);
    }
}
?>