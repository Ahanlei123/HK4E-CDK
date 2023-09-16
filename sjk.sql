-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2023-09-05 12:36:31
-- 服务器版本： 5.6.50-log
-- PHP 版本： 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `sjk`
--

-- --------------------------------------------------------

--
-- 表的结构 `app_zx`
--

CREATE TABLE `app_zx` (
  `id` int(11) NOT NULL,
  `cmd` text NOT NULL COMMENT '执行命令',
  `uid` text NOT NULL COMMENT '执行uid',
  `sj` text NOT NULL COMMENT '生成时间',
  `zt` text NOT NULL COMMENT '执行状态',
  `js` text NOT NULL COMMENT '介绍'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `cdk_gf`
--

CREATE TABLE `cdk_gf` (
  `id` int(11) NOT NULL,
  `cdk` text NOT NULL,
  `wp` text NOT NULL COMMENT '物品',
  `sl` text NOT NULL COMMENT '数量',
  `bt` text NOT NULL COMMENT '标题',
  `nr` text NOT NULL COMMENT '内容',
  `uid` text COMMENT '使用人',
  `bduid` text NOT NULL,
  `sc` text NOT NULL COMMENT '生成人',
  `zt` text NOT NULL COMMENT '状态',
  `sj` text NOT NULL COMMENT '生成时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `cdk_ios`
--

CREATE TABLE `cdk_ios` (
  `id` int(11) NOT NULL,
  `cdk` varchar(20) NOT NULL,
  `ios` text NOT NULL COMMENT 'IOS版本',
  `ip` text NOT NULL COMMENT 'IP',
  `sc` text NOT NULL COMMENT '生成人',
  `zt` text NOT NULL COMMENT '状态',
  `sj` text NOT NULL COMMENT '生成时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `cdk_jr`
--

CREATE TABLE `cdk_jr` (
  `id` int(11) NOT NULL,
  `cdk` text NOT NULL COMMENT 'CDK',
  `kssj` text NOT NULL COMMENT '领取时间',
  `jssj` text NOT NULL COMMENT '结束时间',
  `lb` text NOT NULL COMMENT '礼包',
  `name` text NOT NULL COMMENT '礼包名称'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `cdk_lb`
--

CREATE TABLE `cdk_lb` (
  `id` int(11) NOT NULL,
  `uid` text NOT NULL COMMENT '领取uid',
  `sj` text NOT NULL COMMENT '领取时间',
  `lb` text NOT NULL COMMENT '领取状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `cdk_qx`
--

CREATE TABLE `cdk_qx` (
  `id` int(11) NOT NULL,
  `cdk` varchar(20) NOT NULL,
  `wp` varchar(32) NOT NULL COMMENT '物品',
  `sl` varchar(10) NOT NULL COMMENT '数量',
  `bt` text NOT NULL COMMENT '标题',
  `nr` text NOT NULL COMMENT '内容',
  `uid` text COMMENT '使用人',
  `sc` varchar(40) NOT NULL COMMENT '生成人',
  `zt` text NOT NULL COMMENT '状态',
  `sj` text NOT NULL COMMENT '生成时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `cdk_wp`
--

CREATE TABLE `cdk_wp` (
  `id` int(11) NOT NULL,
  `cdk` varchar(20) NOT NULL,
  `wp` text NOT NULL COMMENT '物品',
  `sl` varchar(10) NOT NULL COMMENT '数量',
  `bt` text NOT NULL COMMENT '标题',
  `nr` text NOT NULL COMMENT '内容',
  `uid` text COMMENT '使用人',
  `sc` varchar(40) NOT NULL COMMENT '生成人',
  `zt` text NOT NULL COMMENT '状态',
  `sj` text NOT NULL COMMENT '生成时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `cdk_xs`
--

CREATE TABLE `cdk_xs` (
  `id` int(11) NOT NULL,
  `uid` text NOT NULL COMMENT '领取uid',
  `sj` text NOT NULL COMMENT '领取时间',
  `zt` text NOT NULL COMMENT '领取状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `cj_log`
--

CREATE TABLE `cj_log` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL COMMENT '订单编号',
  `wpid` text NOT NULL COMMENT '订单手机',
  `name` text NOT NULL COMMENT '商品名称',
  `sj` text NOT NULL COMMENT '时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `cz_ddsj`
--

CREATE TABLE `cz_ddsj` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL COMMENT '账号',
  `uid` text NOT NULL COMMENT '绑定uid',
  `gmdz` text NOT NULL COMMENT 'GM地址',
  `name` text,
  `money` text,
  `dd` text,
  `zt` text NOT NULL COMMENT '支付状态',
  `type` text NOT NULL COMMENT '支付方式',
  `cmd` text COMMENT '执行指令',
  `ddsj` text,
  `bf` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `game_kc`
--

CREATE TABLE `game_kc` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `up1` text NOT NULL,
  `up2` text NOT NULL,
  `gacha_prefab_path` text NOT NULL,
  `gacha_preview_prefab_path` text NOT NULL,
  `title_textmap` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `game_rw`
--

CREATE TABLE `game_rw` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL COMMENT '物品',
  `uuid` text NOT NULL COMMENT 'UID',
  `lx` text NOT NULL COMMENT '类型'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `game_rwsx`
--

CREATE TABLE `game_rwsx` (
  `id` int(11) NOT NULL,
  `qzrw` text NOT NULL COMMENT '前置任务',
  `hzrw` text NOT NULL COMMENT '后置任务',
  `name` text NOT NULL COMMENT '任务大名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `game_syw`
--

CREATE TABLE `game_syw` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL COMMENT '物品',
  `uuid` text NOT NULL COMMENT 'UID',
  `lx` text NOT NULL COMMENT '类型'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `game_wp`
--

CREATE TABLE `game_wp` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL COMMENT '物品',
  `uuid` text NOT NULL COMMENT 'UID',
  `lx` text NOT NULL COMMENT '类型'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `game_wq`
--

CREATE TABLE `game_wq` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL COMMENT '物品',
  `uuid` text NOT NULL COMMENT 'UID',
  `lx` text NOT NULL COMMENT '类型'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `game_xs`
--

CREATE TABLE `game_xs` (
  `id` int(11) NOT NULL,
  `wpsl` text NOT NULL COMMENT '物品数量',
  `uuid` text NOT NULL COMMENT 'UID',
  `lx` text NOT NULL COMMENT '类型'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `login_infor`
--

CREATE TABLE `login_infor` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `logindata` varchar(100) NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `mod_xz`
--

CREATE TABLE `mod_xz` (
  `id` int(11) NOT NULL,
  `image_file` text COMMENT 'mod图',
  `image_name` text COMMENT 'mod名',
  `image_jg` text COMMENT 'mod价格',
  `image_xz` text NOT NULL COMMENT 'mod下载',
  `category` text COMMENT '分类'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `qdq_log`
--

CREATE TABLE `qdq_log` (
  `id` int(11) NOT NULL,
  `rz` text NOT NULL COMMENT '日志',
  `ip` text NOT NULL COMMENT 'IP',
  `sj` text NOT NULL COMMENT '时间',
  `lx` text NOT NULL COMMENT '类型',
  `dz` text NOT NULL COMMENT '地址',
  `jqm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `qdq_pz`
--

CREATE TABLE `qdq_pz` (
  `id` int(11) NOT NULL,
  `bb` text NOT NULL COMMENT '版本',
  `gx` text NOT NULL COMMENT '更新地址',
  `qz` text NOT NULL COMMENT '强制更新',
  `gg` text NOT NULL,
  `fwq` text NOT NULL,
  `dk` text NOT NULL,
  `gxrz` text NOT NULL COMMENT '更新日志',
  `khd1` text NOT NULL COMMENT '客户端1',
  `khd2` text NOT NULL COMMENT '客户端2',
  `xz31` text NOT NULL COMMENT '下载3.2',
  `xzaz` text NOT NULL COMMENT '下载安卓',
  `bdy` text NOT NULL COMMENT '百度云极速下载',
  `idm` text NOT NULL COMMENT 'IDM下载',
  `zczh` text NOT NULL COMMENT '注册账号',
  `shjl` text NOT NULL COMMENT '售后链接',
  `ycgj` text NOT NULL COMMENT '远程工具',
  `kmgm` text NOT NULL COMMENT '卡密购买',
  `mod` text NOT NULL,
  `thjc` text NOT NULL COMMENT '替换教程',
  `jc` text NOT NULL COMMENT '教程'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `vip` text,
  `gmbb` text NOT NULL,
  `gf11uid` text,
  `sex` varchar(10) NOT NULL DEFAULT '男',
  `age` text COMMENT '指令服UID',
  `zlf` text,
  `dqrw` text COMMENT '当前任务',
  `email` varchar(20) NOT NULL,
  `uid` varchar(6) DEFAULT NULL,
  `love` varchar(40) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `daili` text,
  `zt` text,
  `jf` text,
  `srdz` text,
  `srdzuid` text,
  `mrlb` text,
  `mzlb` text,
  `mylb` text,
  `regDate` int(11) NOT NULL,
  `userreg` text,
  `zhsx` text,
  `yqr` text,
  `qb` text,
  `log` text,
  `head` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `web_sz`
--

CREATE TABLE `web_sz` (
  `id` int(11) NOT NULL,
  `dxzh` text NOT NULL COMMENT '执行命令',
  `dxmm` text NOT NULL COMMENT '执行uid',
  `dxnr` text NOT NULL COMMENT '生成时间',
  `sjkdz` text NOT NULL COMMENT '执行状态',
  `wssdz` text NOT NULL,
  `js` text NOT NULL COMMENT '介绍'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `xy_ddsj`
--

CREATE TABLE `xy_ddsj` (
  `id` int(11) NOT NULL,
  `ddbh` text NOT NULL COMMENT '订单编号',
  `ddsj` text NOT NULL COMMENT '订单手机',
  `ddmc` text NOT NULL COMMENT '商品名称',
  `ddje` text NOT NULL COMMENT '订单金额',
  `ddkm` text NOT NULL COMMENT '订单卡密',
  `sj` text NOT NULL COMMENT '时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转储表的索引
--

--
-- 表的索引 `app_zx`
--
ALTER TABLE `app_zx`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `cdk_gf`
--
ALTER TABLE `cdk_gf`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `cdk_ios`
--
ALTER TABLE `cdk_ios`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `cdk_jr`
--
ALTER TABLE `cdk_jr`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `cdk_lb`
--
ALTER TABLE `cdk_lb`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `cdk_qx`
--
ALTER TABLE `cdk_qx`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `cdk_wp`
--
ALTER TABLE `cdk_wp`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `cdk_xs`
--
ALTER TABLE `cdk_xs`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `cj_log`
--
ALTER TABLE `cj_log`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `cz_ddsj`
--
ALTER TABLE `cz_ddsj`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `game_kc`
--
ALTER TABLE `game_kc`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `game_rw`
--
ALTER TABLE `game_rw`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `game_rwsx`
--
ALTER TABLE `game_rwsx`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `game_syw`
--
ALTER TABLE `game_syw`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `game_wp`
--
ALTER TABLE `game_wp`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `game_wq`
--
ALTER TABLE `game_wq`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `game_xs`
--
ALTER TABLE `game_xs`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `login_infor`
--
ALTER TABLE `login_infor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`userid`);

--
-- 表的索引 `mod_xz`
--
ALTER TABLE `mod_xz`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `qdq_log`
--
ALTER TABLE `qdq_log`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `qdq_pz`
--
ALTER TABLE `qdq_pz`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `web_sz`
--
ALTER TABLE `web_sz`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `xy_ddsj`
--
ALTER TABLE `xy_ddsj`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `app_zx`
--
ALTER TABLE `app_zx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49451;

--
-- 使用表AUTO_INCREMENT `cdk_gf`
--
ALTER TABLE `cdk_gf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `cdk_ios`
--
ALTER TABLE `cdk_ios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=715;

--
-- 使用表AUTO_INCREMENT `cdk_jr`
--
ALTER TABLE `cdk_jr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `cdk_lb`
--
ALTER TABLE `cdk_lb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6583;

--
-- 使用表AUTO_INCREMENT `cdk_qx`
--
ALTER TABLE `cdk_qx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `cdk_wp`
--
ALTER TABLE `cdk_wp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49712;

--
-- 使用表AUTO_INCREMENT `cdk_xs`
--
ALTER TABLE `cdk_xs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16147;

--
-- 使用表AUTO_INCREMENT `cj_log`
--
ALTER TABLE `cj_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `cz_ddsj`
--
ALTER TABLE `cz_ddsj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1392;

--
-- 使用表AUTO_INCREMENT `game_kc`
--
ALTER TABLE `game_kc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- 使用表AUTO_INCREMENT `game_rw`
--
ALTER TABLE `game_rw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12554;

--
-- 使用表AUTO_INCREMENT `game_rwsx`
--
ALTER TABLE `game_rwsx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用表AUTO_INCREMENT `game_syw`
--
ALTER TABLE `game_syw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3111;

--
-- 使用表AUTO_INCREMENT `game_wp`
--
ALTER TABLE `game_wp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5048;

--
-- 使用表AUTO_INCREMENT `game_wq`
--
ALTER TABLE `game_wq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- 使用表AUTO_INCREMENT `game_xs`
--
ALTER TABLE `game_xs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- 使用表AUTO_INCREMENT `login_infor`
--
ALTER TABLE `login_infor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- 使用表AUTO_INCREMENT `mod_xz`
--
ALTER TABLE `mod_xz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `qdq_log`
--
ALTER TABLE `qdq_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `qdq_pz`
--
ALTER TABLE `qdq_pz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用表AUTO_INCREMENT `web_sz`
--
ALTER TABLE `web_sz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `xy_ddsj`
--
ALTER TABLE `xy_ddsj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 限制导出的表
--

--
-- 限制表 `login_infor`
--
ALTER TABLE `login_infor`
  ADD CONSTRAINT `id` FOREIGN KEY (`userid`) REFERENCES `user_information` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
