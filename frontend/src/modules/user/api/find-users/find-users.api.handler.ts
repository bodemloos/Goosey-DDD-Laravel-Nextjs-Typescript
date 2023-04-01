import { IQueryHandler, QueryHandler } from '@nestjs/cqrs';
import { Ok, Result } from 'oxide.ts';
import { PaginatedParams, PaginatedQueryBase } from '@libs/ddd/query.base';
import { Paginated } from '@src/libs/ddd';
import { UserModel } from '../../database/user.repository';

export class FindUsersApi extends PaginatedQueryBase {
  readonly country?: string;

  readonly postalCode?: string;

  readonly street?: string;

  constructor(props: PaginatedParams<FindUsersApi>) {
    super(props);
    this.country = props.country;
    this.postalCode = props.postalCode;
    this.street = props.street;
  }
}

@QueryHandler(FindUsersApi)
export class FindUsersApiHandler implements IQueryHandler {
  /**
   * In read model we don't need to execute
   * any business logic, so we can bypass
   * domain and repository layers completely
   * and execute query directly
   */
  async execute(
    query: FindUsersApi,
  ): Promise<Result<Paginated<UserModel>, Error>> {
    



    
    return Ok(
      new Paginated({
        data: records.rows,
        count: records.rowCount,
        limit: query.limit,
        page: query.page,
      }),
    );
  }
}
