CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tipo_doc_save`(
	pidtipodoc int(11),
    ptipodoc varchar(45),
    pdatacad timestamp,
    pdataedi date
    )
begin
    
		if pidtipodoc > 0 then
        update tbtipodoc set
			tipodoc = ptipodoc,
            datacad = pdatacad,
            dataedi = pdataedi
		where
			idtipodoc = pidtipodoc;
	else
		insert into tb_tipo_doc( 
			tipodoc, 
			datacad, 
			dataedi 
        ) values (
			ptipodoc,
            pdatacad,
            pdataedi
		);
set pidtipodoc = last_insert_id();

end if;

select * from tb_tipo_doc where idtipodoc = pidtipodoc;

end