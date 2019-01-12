use `db_ecommerce`;
drop procedure if exists `sp_centro_de_custos_save`;
delimiter $$

use `db_ecommerce`$$

create procedure `sp_centro_de_custos_save`(
	pid_centro_de_custo int(11),
    pcentro_de_custo varchar(45),
    ptipo_movimento char(1),
    pdata_cri timestamp,
    pdata_edi date
    )
    begin
    
		if pid_centro_de_custo > 0 then
        update tb_centro_de_custos set
			centro_de_custo = pcentro_de_custo,
            tipo_movimento = ptipo_movimento,
            data_cri = pdata_cri,
            data_edi = pdata_edi
		where
			id_centro_de_custo = pid_centro_de_custo;
	else
		insert into tb_centro_de_custos( 
			centro_de_custo,
            tipo_movimento,
            data_cri,
            data_edi
        ) values (
			pcentro_de_custo,
            ptipo_movimento,
            pdata_cri,
            pdata_edi
		);
set pid_centro_de_custo = last_insert_id();

end if;

select * from tb_centro_de_custos where id_centro_de_custo = pid_centro_de_custo;

end$$

delimiter ;
	